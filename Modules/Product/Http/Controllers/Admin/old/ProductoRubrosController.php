<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//controller AdminBase
use App\Http\Controllers\AdminBaseController;

//Request
// use Modules\Productos\Http\Requests\MarcaCreateRequest;
// use Modules\Productos\Http\Requests\MarcaUpdateRequest;

//modelos
use Modules\Productos\Entities\ProductoRubros;

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


class ProductoRubrosController extends AdminBaseController
{
    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }




    public function index(Request $request)
    {
        return view('productos::admin.rubros.index');
    }


    public function indexDatatable(Request $request)
    {
        $list=ProductoRubros::all();
        return Datatables::of($list)->make(true);
    }




    public function store(Request $request)
    {

        $rubro = new ProductoRubros;
        $rubro->descripcion = $request['descripcion'];
        $rubro->save();

        Alert::success('Mensaje existoso', 'Rubro Creada');
         return Redirect::back();
    }




    public function edit(Request $request,$id)
    {
        //si es por ajax
        if ($request->ajax()) {
            $rubro=ProductoRubros::find($id);
            return response($rubro);
        }

        $ruebro=ProductoRubros::find($id);
        return view('productos::admin.rubros.edit',compact('rubro'));
    }





    public function update(Request $request)
    {
       $rubro=ProductoRubros::find($request['id']);
       $rubro->descripcion = $request['descripcion'];
       $rubro->save();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Rubro Modificada');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rubro=ProductoRubros::find($request['id']);
        $rubro->delete();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Rubro Eliminada');
        return Redirect::back();
    }
}
