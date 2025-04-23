<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//request
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Models\User;

use Illuminate\Support\Facades\Redirect;
use Auth;
Use Alert;
use DataTables;
use Hash;
//use validated

//AdminBaseController
use App\Http\Controllers\AdminBaseController;

// Traits
use Modules\FileUploadModule\Http\Traits\FileUploadingTrait;

class UserProfileController extends AdminBaseController
{
    use FileUploadingTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initializeFileUploadingTrait(); // Inicializa las propiedades en el trait
    }

    public function index()
    {
        $user = Auth::user()->load('media');
        return view('client.user.setting.index', compact('user'));
    }

    public function changePassword(Request $request,User $user)
    {
        $request->validate([
            'password_actual' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $comprobarPass = Hash::check($request['password_actual'], $user->password ) ;
        $comprobarRePass = Hash::check($request['password'], $request['password_confirmation']) ;

        if ( $comprobarPass == true) {
            if ($request['password'] == $request['password_confirmation'] ) {

           $user->password = bcrypt($request['password']);
           $user->re_password = $request['password'];
           $user->save();
           Alert::success('Mensaje existoso', 'Contraseña Cambiada Con Exito');

           return Redirect::back();
             }else{
                 flash('el nuevo password no coincide con Re-Password.')->error();
                 return Redirect::back();
             }
         }else{
             flash('la contraseñna actual no coincide con la ingresada.')->error();
             return Redirect::back();
         }
        return Redirect::back();
    }

    public function changePhoto(Request $request)
    {

        $item = User::where('uuid', $request->uuid_perfil_edit)->first();

        // Carga de Imagenes y Archivos y CKEditor
        $this->storeFiles($request, $item, $this->ckeditorFields, $this->filepondFields);

        sweetalert()->addSuccess('Foto de Perfil Cambiada Con Exito');
        return Redirect::back();

    }

    public function changeInfo(Request $request,User $user)
    {
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->dni = $request['dni'];
        $user->save();

        sweetalert()->addSuccess('Informacion de Perfil Cambiada Con Exito');
        return Redirect::back();
    }

}
