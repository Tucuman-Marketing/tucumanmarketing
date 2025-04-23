<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;

// use jeremykenedy\LaravelRoles\Models\Role;
// use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Traits\RolesAndPermissionsHelpersTrait;

//request
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

//models
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use Uuid;
use Auth;
use Illuminate\Support\Facades\Redirect;
Use Alert;
use Yajra\DataTables\Facades\DataTables;
use Route;

// Traits
use App\Traits\Imagen;

//AdminBaseController
use App\Http\Controllers\AdminBaseController;

use App\Http\Services\Admin\Users\RolesService;

class UserRolesController extends AdminBaseController
{
    use RolesAndPermissionsHelpersTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request){
        return view("admin.user.roles.index");
    }

    public function indexDatatable(Request $request)
    {
        $SearchService = new RolesService();
        $searchParameters = $request->all();
        $query = $SearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $SearchService->buildDatatable($query);
        return $dataTable->make(true);
    }


public function show($uuid)
{
    $permissions = Permission::all();
    $rol = Role::where('uuid', $uuid)->first();
    $rolesPermissions = collect();

    foreach ($rol->permissions()->get() as $rolPermission) {
        $rolPermission->active = "yes";
        $rolesPermissions->push($rolPermission);
    }

    foreach ($rol->permissions()->get() as $rolPermission) {
        foreach ($permissions as $key => $Permission) {
            if ($rolPermission->slug == $Permission->slug) {
                $permissions->pull($key);
            }
        }
    }

    $permissions = $rolesPermissions->concat($permissions);

    $order = ['access', 'view', 'create', 'edit', 'delete'];
    $permissions = $permissions->sortBy(function ($permission) use ($order) {
        foreach ($order as $index => $value) {
            if (strpos($permission->slug, $value) !== false) {
                return $index;
            }
        }
    });

    $permissions = $permissions->sortBy('name')->groupBy('module');

    return view('admin.user.roles.forms.show', ['rol' => $rol, 'permissions' => $permissions]);
}

    public function store(Request $request){
       $rol = new Role;
       $rol->uuid = (string) Uuid::generate(4);
       $rol->name=$request['name'];
       $rol->slug=Str::slug($request['name']);
       $rol->description=$request['description'];
       $rol->save();
       sweetalert()->addSuccess('Rol Creado.');
       return redirect()->route('admin.roles.index');
    }

    public function edit(Request $request,$uuid)
    {
            $permissions = Permission::all();
            $roles = Role::where("uuid","=",$uuid)->first();
            $rolesPermissions = collect();
            $newCollection = collect();


            foreach ($roles->permissions()->get() as $rolPermission){
                    $rolPermission->active = "yes";
                    $rolesPermissions->push($rolPermission);
            }

            foreach ($roles->permissions()->get() as $rolPermission){
                foreach ($permissions as $key => $Permission){
                if ($rolPermission->slug == $Permission->slug){
                    $permissions->pull( $key );
                }
                }
            }
            $permissions = $rolesPermissions->concat($permissions);

            $order = ['access', 'view', 'create', 'edit', 'delete'];
            $permissions = $permissions->sortBy(function ($permission) use ($order) {
                foreach ($order as $index => $value) {
                    if (strpos($permission->slug, $value) !== false) {
                        return $index;
                    }
                }
            });

            $permissions = $permissions->sortBy('name')->groupBy('module');
            return view('admin.user.roles.forms.edit', ['roles' => $roles , 'permissions' => $permissions]);

    }

    public function update(Request $request){
        $role = Role::where('uuid','=',$request['uuid'])->first();
        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->description = $request['description'];
        $role->save();

        //asignamos los permisos al rol
        $this->assignPermissionToRole($request,$role);

        sweetalert()->addSuccess('Rol Modificado.');
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Request $request)
    {
        $role = Role::where('uuid', '=', $request['uuid_delete'])->first();
        $users = User::all();
        //eliminamos las relaciones roles user
        foreach ($users as $key => $user) {
           $user->detachRole($role->id);
        }
        $role->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.roles.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $roles = Role::whereIn('uuid', $uuidsArray)->get();
        $users = User::all();

        foreach ($roles as $role) {
            // Eliminamos las relaciones roles user
            foreach ($users as $user) {
                $user->detachRole($role->id);
            }
            // Eliminamos el rol
            $role->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.roles.index');
    }

/*-------------------------ASIGNACIONES DE PERMISOS A ROLES ------------------------*/

    // public function rolPermiso(Request $request,$idrol){
    //     //si es una peticion ajax
    //     $todosLosPermisos = permission::all();

    //     foreach ($todosLosPermisos as $key => $permiso) {
    //     $ModuloPermisos[$permiso->name] = permission::where('name','=',$permiso->name)->get();
    //     }

    //     $role = Role::find($idrol);

    //     return view("admin.usuario.roles.asignar-permisos-a-roles",compact('todosLosPermisos','role','ModuloPermisos'));
    // }

    public function assignPermissionToRole($request,$role){
        //eliminamos todos los permisos de ese rol
        $role->detachAllPermissions();
        //asignamos de nuevo los permisos al rol
            $permissions = Permission::all();
            foreach ($permissions as $key => $permission) {
            $slug = $permission->slug; // productos-create
            if(isset($request[$slug]) and $request[$slug] == "on"){
                //asignamos el permiso al rol
                $role->attachPermission($permission->id);
                //creamos el uuid para ese permiso
            }
            }
    }

    public function rolAsignarAllPermiso(Request $request){

                $rolid = $request['idrol'];
                $Permisos = Permission::all();
                foreach ($Permisos as $Permiso) {
                    $rol=Role::find($rolid);
                    $rol->assignPermission($Permiso->id);
                    $rol->save();
                }

                return redirect::back();
    }

    public function rolQuitarPermiso(Request $request,$idrole,$idper){

                $role = Role::find($idrole);
                $role->revokePermission($idper);
                $role->save();
                return "ok";
    }


}
