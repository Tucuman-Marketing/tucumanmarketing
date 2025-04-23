<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//controller AdminBase
use App\Http\Controllers\AdminBaseController;

//modelos
use Modules\Productos\Entities\ProductoProvedores;

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
use Hash;
use View;
use Hashids;
use Excel;

class ProductoProvedoresController extends AdminBaseController
{

    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }




    public function index(Request $request)
    {
        return view('productos::admin.proveedores.index');
    }


    public function indexDatatable(Request $request)
    {
        $list=ProductoProvedores::all();
        return Datatables::of($list)->make(true);
    }




    public function store(Request $request)
    {
        if(!empty($request->hasFile('imagen'))){
           $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            image::make($imagen->getRealPath())->save('storage/proveedores/'. $filename);
            $ruta = 'storage/proveedores/'.$filename;
        }elseif(empty($request->hasFile('imagen'))){
            $filename = "sin-imagen.jpg";
            $ruta = "theme-admin/velvet/assets/images/sin-imagen.jpg";
        }


        $proveedor = new ProductoProvedores;
        $proveedor->razonsocial = $request['razonsocial'];
        $proveedor->contacto = $request['contacto'];
        $proveedor->email = $request['email'];
        $proveedor->skype = $request['skype'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->telefono = $request['telefono'];
        //$proveedor->dia_visita = $request['dia_visita'];
        $proveedor->cuit = $request['cuit'];
        $proveedor->observacion = $request['observacion'];
        $proveedor->status = $request['status'];
        $proveedor->imagen = $ruta;
        $proveedor->filename = $filename;
        $proveedor->save();

        Alert::success('Mensaje existoso', 'Proveedor Creado');
         return Redirect::back();
    }




    public function edit(Request $request,$id)
    {
        //si es por ajax
        if ($request->ajax()) {
            $proveedor=ProductoProvedores::find($id);
            return response($proveedor);
        }
        $proveedor=ProductoProvedores::find($id);
        return view('productos::admin.proveedores.edit',compact('proveedor'));
    }





    public function update(Request $request)
    {

        $proveedor=ProductoProvedores::find($request['id']);


         if(!empty($request->hasFile('imagen'))){
           $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            //eliminamos la imagen anterior
            if ($proveedor->filename != "sin-imagen.jpg") {
                \File::delete(public_path().'/'.$proveedor->imagen);
            }

            image::make($imagen->getRealPath())->save('storage/proveedores/'. $filename);
            $ruta = 'storage/proveedores/'.$filename;


            $proveedor=ProductoProvedores::find($request['id']);
            $proveedor->filename = $filename;
            $proveedor->imagen = $ruta;
            $proveedor->save();

        }


        $proveedor->razonsocial = $request['razonsocial'];
        $proveedor->contacto = $request['contacto'];
        $proveedor->email = $request['email'];
        $proveedor->skype = $request['skype'];
        $proveedor->direccion = $request['direccion'];
        $proveedor->telefono = $request['telefono'];
        //$proveedor->dia_visita = $request['dia_visita'];
        $proveedor->cuit = $request['cuit'];
        $proveedor->observacion = $request['observacion'];
        $proveedor->status = $request['status'];
        $proveedor->save();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Proveedor Modificado');
        return Redirect::back();
    }




    public function destroy(Request $request)
    {
        $proveedor=ProductoProvedores::find($request['id']);
        //Integridad Referencial
        $proveedor->IntegridadRefencial($proveedor);
        //elimino la imagen
        if ($proveedor->filename != "sin-imagen.jpg") {
                \File::delete(public_path().'/'.$proveedor->imagen);
            }
         $proveedor->delete();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Proveedor Eliminado');
        flash('Se eliminaron correctamente las relaciones de las compras.')->success();
        flash('Se eliminaron correctamente las relaciones de los productos.')->success();

        return Redirect::back();
    }

}
