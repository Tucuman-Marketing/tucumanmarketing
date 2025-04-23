<?php

namespace App\Http\Controllers\User;

//LIBRARIES
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Redirect;
use Auth;
Use Alert;
use DataTables;

//MODELS
use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;

//REQUESTS
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

//TRAIT
use App\Traits\Imagen;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use App\Http\Services\Admin\Users\UsersSearchService;

use Modules\FileUploadModule\Http\Traits\FileUploadingTrait;
class UserController extends AdminBaseController
{

    use FileUploadingTrait;


    public function __construct()
    {
        parent::__construct();
        $this->initializeFileUploadingTrait(); // Inicializa las propiedades en el trait
    }


    public function index()
    {
        return view('admin.user.user.index');
    }

    public function indexDatatable(Request $request)
    {
        $SearchService = new UsersSearchService();
        $searchParameters = $request->all();
        $query = $SearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $SearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function store(UserStoreRequest $request)
    {
        $data['confirmation_code'] = str_random(25);
        $data['password'] = $request['password'];

        $user = new User;
        $user->name =   $request['name'];
        $user->lastname =   $request['lastname'];
        $user->password =   bcrypt($request['password']);
        $user->re_password =   bcrypt($request['password_confirmation']);
        $user->email =   $request['email'];
        $user->confirmation_code =   $data['confirmation_code'];
        $user->save();



        // Carga de Imagenes y Archivos y CKEditor
        $this->storeFiles($request, $user, $this->ckeditorFields, $this->filepondFields);


        //  $data['email'] = $user->email;
        //  $data['nombre'] = $user->nombre;
        //  $data['apellido'] = $user->apellido;

        // // Send confirmation code
        // Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
        //     $message->to($data['email'], $data['nombre'],$data['apellido'])
        //     ->subject('Por favor confirma tu correo.');
        // });


        sweetalert()->addSuccess('Usuario Creado');
        return redirect()->route('admin.users.index');


    }

    public function show($uuid)
    {
        $user = User::where('uuid', '=', $uuid)->first();
        return view('admin.customer.forms.show' , ['data' => $user]);
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', '=', $uuid)->first();
        $roles = Role::all();
        return view('admin.user.user.forms.edit' , ['data' => $user, 'roles' => $roles]);
    }

    public function update(UserUpdateRequest $request)
    {


        $user=User::where('uuid','=',$request['uuid'])->first();

        // if(!empty($request['password'])){
        // $user->password=bcrypt($request['password']);
        // $user->re_password=$request['password_confirmation'];
        // }

        $email = User::where('email','=',$request['email'])->first();
        if($email == null or  $user->uuid == $email->uuid){
            $user->email = $request['email'];
        }else{
            sweetalert()->addError('El email ya se encuenta registrado.');
            return redirect()->route('admin.users.index');
        }


        $user->name =$request['name'];
        $user->lastname =$request['lastname'];
        $user->phone =$request['phone'];
        $user->email =$request['email'];
        $user->address =$request['address'];
        $user->save();


        // Carga de Imagenes y Archivos y CKEditor
        $this->updateFiles($request, $user, $this->ckeditorFields, $this->filepondFields);

        sweetalert()->addSuccess('Usuario Actualizado.');
        return redirect()->route('admin.users.index');

    }

    public function destroy(Request $request)
    {
        $user=User::where('uuid','=',$request['uuid_delete'])->first();
        $user->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.users.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = User::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.users.index');
    }

    /*-------------------------ASIGNACIONES DE ROLES A USUARIOS ------------------------*/
    public function userAssingRol(Request $request) {
        if ($request->ajax()) {
            $user = User::where('uuid', '=', $request->uuid)->first();
            $role = Role::where('id', '=', $request->role_id)->first();
            $user->attachRole($role);

            // Refrescamos la búsqueda del usuario
            $rolesasignados = $user->getRoles();
            return response()->json($rolesasignados);
        }
    }

    public function useDeleteRol(Request $request) {
        if ($request->ajax()) {
            $user = User::where('uuid', '=', $request->uuid)->first();
            $role = Role::where('id', '=', $request->role_id)->first();
            $user->detachRole($role);

            // Refrescamos la búsqueda del usuario
            $rolesasignados = $user->getRoles();
            return response()->json($rolesasignados);
        }
    }
    /*-------------------------ASIGNACIONES DE ROLES A USUARIOS ------------------------*/

}
