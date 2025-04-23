<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;

// use jeremykenedy\LaravelRoles\Models\Role;
//use jeremykenedy\LaravelRoles\Models\Permission;
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

class UserPermissionsController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

/*-------------------------PERMISOS------------------------*/

    public function index(Request $request){
        $Permissions = Permission::all();
        $Permissions = $Permissions->sortBy('id')->groupBy('module');

        return view("admin.user.permissions.index",compact('Permissions'));
    }

    public function listPermissionsDatatable(Request $request)
    {
        $list = Permission::all();
        $list = $list->sortBy('id')->groupBy('module');
        return Datatables::of($list)->make(true);
    }

    public function store(Request $request){

        $module = $request['module'];

        $Permission = new Permission;
        $Permission->uuid = (string) Uuid::generate(4);
        $Permission->name = $module;
        $Permission->slug = Str::slug($module).'-'."access";
        $Permission->description = Str::slug($module).'-'."access";
        $Permission->module = $module;
        $Permission->save();

        $Permission = new Permission;
        $Permission->uuid = (string) Uuid::generate(4);
        $Permission->name = $module;
        $Permission->slug = Str::slug($module).'-'."view";
        $Permission->description = Str::slug($module).'-'."view";
        $Permission->module = $module;
        $Permission->save();

        $Permission = new Permission;
        $Permission->uuid = (string) Uuid::generate(4);
        $Permission->name = $module;
        $Permission->slug = Str::slug($module).'-'."create";
        $Permission->description = Str::slug($module).'-'."create";
        $Permission->module = $module;
        $Permission->save();

        $Permission = new Permission;
        $Permission->uuid = (string) Uuid::generate(4);
        $Permission->name = $module;
        $Permission->slug = Str::slug($module).'-'."edit";
        $Permission->description = Str::slug($module).'-'."edit";
        $Permission->module = $module;
        $Permission->save();

        $Permission = new Permission;
        $Permission->uuid = (string) Uuid::generate(4);
        $Permission->name = $module;
        $Permission->slug = Str::slug($module).'-'."delete";
        $Permission->description = Str::slug($module).'-'."delete";
        $Permission->module = $module;
        $Permission->save();

        Alert::success('Mensaje existoso', 'Permisos Creados');
        return redirect::back();

    }




    public function destroy(Request $request){
        $Permissions = Permission::where('module','=',$request['permission_module'])->get();
        foreach ($Permissions as $key => $Permission) {
            $Permission->delete();
        }
        Alert::success('Mensaje existoso', 'Permisos del Modulo Eliminado');
        return redirect::back();
     }



}
