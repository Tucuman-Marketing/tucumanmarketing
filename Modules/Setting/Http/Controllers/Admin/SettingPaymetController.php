<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

//model
use Modules\Setting\Entities\SettingPaymet;


use Laracasts\Flash\Flash;
use Session;
use Redirect;
use DB;
use Auth;
use Toastr;
use Exception;
use Hash;
use Hashids;

//AdminBaseController
use App\Http\Controllers\AdminBaseController;

class SettingPaymetController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function index()
    {
        //setring paymet
        $settingPaymet = SettingPaymet::first();

        return view('setting::admin.setting-paymet.index', compact('settingPaymet'));
    }


    public function store(Request $request)
    {
        //save
        $settingPaymet = new settingPaymet;
        $settingPaymet->public_key = $request->username;
        $settingPaymet->private_key = $request->private_key;
        $settingPaymet->access_token = $request->access_token;
        $settingPaymet->percentage = $request->percentage;
        $settingPaymet->type = $request->type;
        $settingPaymet->save();
        //session message
        Session::flash('message', 'Configuracion Guardado correctamente');

        return redirect()->route('setting.paymet.index');
    }

 
    public function update(Request $request)
    {
        //update where uuid
        $settingPaymet = SettingPaymet::where('uuid', $request->uuid_edit)->first();
        $settingPaymet->public_key = $request->username_edit;
        $settingPaymet->private_key = $request->private_key_edit;
        $settingPaymet->access_token = $request->access_token_edit;
        $settingPaymet->percentage = $request->percentage_edit;
        $settingPaymet->type = $request->type_edit;
        $settingPaymet->save();

        //session message
        Session::flash('message', 'Configuracion Modificada correctamente');

        return redirect()->route('setting.paymet.index');
    }


    public function delete(Request $request)
    {
         //delete
         $settingPaymet = SettingPaymet::where('uuid', $request->uuid_delete)->first();
        $settingPaymet->delete();


       //session message
       Session::flash('message', 'Configuracion Eliminada Correctamente');

       return redirect()->route('setting.paymet.index');
    }
}
