<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//controller AdminBase
use App\Http\Controllers\AdminBaseController;

//Request
use Modules\Productos\Http\Requests\MarcaCreateRequest;
use Modules\Productos\Http\Requests\MarcaUpdateRequest;

//modelos
use Modules\Productos\Entities\ProductoMarcas;

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


class ProductoMarcasController extends AdminBaseController
{


    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }



    public function index(Request $request)
    {
        return view('productos::admin.marcas.index');
    }


    public function indexDatatable(Request $request)
    {
        $list=ProductoMarcas::all();
        return Datatables::of($list)->make(true);
    }




    public function store(MarcaCreateRequest $request)
    {

         if(!empty($request->hasFile('imagen'))){
           $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            image::make($imagen->getRealPath())->save('storage/marcas/'. $filename);
             $ruta = 'storage/marcas/'.$filename;

        }elseif(empty($request->hasFile('imagen'))){
            $filename = "sin-imagen.jpg";
            $ruta = "theme-admin/velvet/assets/images/sin-imagen.jpg";
        }

        $marca = new ProductoMarcas;
        $marca->descripcion = $request['descripcion'];
        $marca->imagen = $ruta;
        $marca->filename = $filename;
        $marca->save();
        Alert::success('Mensaje existoso', 'Marca Creada');
         return Redirect::back();
    }






    public function edit(Request $request,$id)
    {
        //si es por ajax
        if ($request->ajax()) {
            $marca=ProductoMarcas::find($id);
            return response($marca);
        }
        $marca=ProductoMarcas::find($id);
        return view('productos::admin.marcas.edit',compact('marca'));
    }





    public function update(MarcaUpdateRequest $request)
    {
       $marca=ProductoMarcas::find($request['id']);
        if(!empty($request->hasFile('imagen'))){
           $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            //eliminamos la imagen anterior - HOSTING
            if ($marca->filename != "sin-imagen.jpg") {
                \File::delete(public_path().'/'.$marca->imagen);
            }
             //eliminamos la imagen anterior - LOCAL
            // \Storage::disk('marcas')->delete($marca->filename);
            //guardamos la imagen nueva
            image::make($imagen->getRealPath())->save('storage/marcas/'. $filename);
            $ruta = 'storage/marcas/'.$filename;

            $marca=ProductoMarcas::find($request['id']);
            $marca->filename = $filename;
            $marca->imagen = $ruta;
            $marca->save();
        }

        $marca->descripcion = $request['descripcion'];
        $marca->save();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Marca Modificada');
        return Redirect::back();
    }





    public function destroy(Request $request)
    {
        $marca=ProductoMarcas::find($request['id']);
        //Integridad Referencial
        $marca->IntegridadRefencial($marca);
        //elimino la imagen - HOSTING
        if ($marca->filename != "sin-imagen.jpg") {
                \File::delete(public_path().'/'.$marca->imagen);
            }
        $marca->delete();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Marca Eliminada');
        flash('Se eliminaron correctamente las relaciones de los productos.')->success();
        return Redirect::back();
    }
}
