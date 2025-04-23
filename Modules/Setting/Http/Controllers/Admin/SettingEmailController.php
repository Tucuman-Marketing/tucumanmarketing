<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//model
use Modules\Setting\Entities\SettingEmail;


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

class SettingEmailController extends AdminBaseController
{


    public function __construct()
    {
        parent::__construct();

    }

    
    public function index()
    {
        //setring email
        $settingEmail = SettingEmail::first();

        return view('setting::admin.setting-email.index', compact('settingEmail'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       
        //save
        $settingEmail = new SettingEmail;
        $settingEmail->username = $request->username;
        $settingEmail->password = $request->password;
        $settingEmail->name = $request->name;
        $settingEmail->address = $request->address;
        $settingEmail->driver = $request->driver;
        $settingEmail->host = $request->host;
        $settingEmail->port = $request->port;
        $settingEmail->encryption = $request->encryption;
        $settingEmail->save();
        //session message
        Session::flash('message', 'Email guardado correctamente');
    

        return redirect()->route('setting.email.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        //update
        $settingEmail = SettingEmail::where('uuid', $request->uuid_edit)->first();
        $settingEmail->username = $request->username;
        $settingEmail->password = $request->password;
        $settingEmail->name = $request->name;
        $settingEmail->address = $request->address;
        $settingEmail->driver = $request->driver;
        $settingEmail->host = $request->host;
        $settingEmail->port = $request->port;
        $settingEmail->encryption = $request->encryption;
        $settingEmail->save();
        //session message
        Session::flash('message', 'Configuracion actualizada correctamente');
        return redirect()->route('setting.email.index');


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(Request $request)
    {
        //delete where uuid
        $settingEmail = SettingEmail::where('uuid', $request->uuid_delete)->first();
        $settingEmail->delete();
        //session message
        Session::flash('message', 'Configuracion eliminada correctamente');
        return redirect()->route('setting.email.index');
    }
}
