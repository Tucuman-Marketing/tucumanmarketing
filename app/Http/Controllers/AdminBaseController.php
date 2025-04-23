<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Notifications\notify;
use Illuminate\Notifications\DatabaseNotification;

//model setting_company
use Modules\Setting\Entities\SettingCompany;



use Notification;
use DataTables;
use Debugbar;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Auth;
use Flash;
use Toastr;
use Carbon\Carbon;
use Exception;
use MP;
use Input;
use Hash;
use View;

class AdminBaseController extends Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __construct() {

        $this->middleware(function ($request, $next){




        //     /*si no existe mi session cart , esntonces la creo con put y creo un array para almacenar los items*/
        //     /*sessiones para VentaController*/
        //  if(!\Session::has('cartweb')) \Session::put('cartweb', array());
        //  if(!\Session::has('newcartweb')) \Session::put('newcartweb', array());
        //  //para cliente ya no es un array ya que almaceno 1 solo objeto
        //  if(!\Session::has('cliente')) \Session::put('cliente');
        //    if(!\Session::has('pc')) \Session::put('pc', array());
        //  if(!\Session::has('checkbox')) \Session::put('checkbox', array());
        //    //serviciotecnicoController
        //  if(!\Session::has('usuarioReparacion')) \Session::put('usuarioReparacion');
        //    //puntoController
        //  if(!\Session::has('usuario')) \Session::put('usuario');



       //datos de la plantilla admin
       // $cartcount = $this->CartCount();
       // View::share ( 'cartcount', $cartcount );


       //Setting
       $setting=SettingCompany::first();
      //  $this->settings = $settings;
       View::share ( 'setting', $setting );

        //mandamos el user logueado
        $user = Auth::user();
        $user->load('media');
        View::share ( 'user', $user );


       //Notificaciones del usuario
       // if (Auth::check()) {
       //   $notificaciones = Auth()->user()->unreadNotifications;
       //   View::share ( 'notificaciones', $notificaciones );
       // }







       return $next($request);
        });
     }
}
