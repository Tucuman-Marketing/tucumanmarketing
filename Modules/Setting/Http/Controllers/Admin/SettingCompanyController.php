<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//model
use Modules\Setting\Entities\SettingCompany;


use Laracasts\Flash\Flash;
use Session;
use Redirect;
use DB;
use Auth;
use Toastr;
use Exception;
use Hash;
use Hashids;

//use trait imagen
use Modules\Setting\Http\Controllers\Traits\Imagen;

//AdminBaseController
use App\Http\Controllers\AdminBaseController;

class SettingCompanyController extends AdminBaseController
{
    use Imagen;
    
    public function __construct()
    {
        parent::__construct();
    }

    
    public function index()
    {
        //company
        $settingCompany = SettingCompany::first();
        return view('setting::admin.setting-company.index',compact('settingCompany'));
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
        //new SettingCompany
        $settingCompany = new SettingCompany;
        $settingCompany->name = $request->name;
        $settingCompany->email = $request->email;
        $settingCompany->phone = $request->phone;
        $settingCompany->addres = $request->addres;

        //link
        $settingCompany->link_facebook = $request->link_facebook;
        $settingCompany->link_instagram = $request->link_instagram;
        $settingCompany->link_twitter = $request->link_twitter;
        $settingCompany->link_youtube = $request->link_youtube;
        $settingCompany->link_google = $request->link_google;

        $settingCompany->save();
        
        //logo
        if ($request->hasFile('logo')) {
            $carpeta = "logo";
            $file = "logo";
            $this->ImagenCreate($request,$carpeta,$file,$settingCompany);
        }

        //favicon
        if ($request->hasFile('favicon')) {
            $carpeta = "favicon";
            $file = "favicon";
            $this->ImagenCreate($request,$carpeta,$file,$settingCompany);
        }

        //save
       //$settingCompany->save();
        //mesagge
        $request->session()->flash('message', 'Se ha creado correctamente');
        //return
        return redirect()->route('setting.company.index');
    }

    
    public function update(Request $request, $id)
    {
       
        //buscamos el settingCompany
        $settingCompany = SettingCompany::find($id);

       //new SettingCompany
       $settingCompany->name = $request->name;
       $settingCompany->email = $request->email;
       $settingCompany->phone = $request->phone;
       $settingCompany->addres = $request->addres;

       //link
       $settingCompany->link_facebook = $request->link_facebook;
       $settingCompany->link_instagram = $request->link_instagram;
       $settingCompany->link_twitter = $request->link_twitter;
       $settingCompany->link_youtube = $request->link_youtube;
       $settingCompany->link_google = $request->link_google;

       $settingCompany->save();
       
      
       //logo
       if ($request->hasFile('logo')) {
           $carpeta = "logo";
           $file = "logo";
           $this->ImagenUpdate($request,$carpeta,$file,$settingCompany);
       }
     

       //favicon
       if ($request->hasFile('favicon')) {
        
           $carpeta = "favicon";
           $file = "favicon";
           $this->ImagenUpdate($request,$carpeta,$file,$settingCompany);
       }
     

       //save
      //$settingCompany->save();
       //mesagge
       $request->session()->flash('message', 'Datos Modificados Correctamente');
       //return
       return redirect()->route('setting.company.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(Request $request)
    {
       
        //delete setting
        $settingCompany = SettingCompany::where('uuid',$request->uuid_delete)->first();
       
        $this->ImagenDelete($settingCompany);
     

        //delete
        $settingCompany->delete();
        //mesagge
        $request->session()->flash('message', 'Se ha eliminado correctamente');
        //return
        return redirect()->route('setting.company.index');

    }
}
