<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//controller AdminBase
use App\Http\Controllers\AdminBaseController;

//model
use Modules\Productos\Entities\ProductoCategoria;
use Modules\Productos\Entities\ProductoCategoriaSub;
use Modules\Productos\Entities\Producto;

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


class ProductoCategoriasSubController extends AdminBaseController
{

    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }


    public function store(Request $request)
    {
        $subcategoria = new ProductoCategoriaSub;
        $subcategoria->nombre = $request['nombre'];
        $subcategoria->slug = str_slug($request['nombre']);
        $subcategoria->icono = $request['icono'];
        //$request['id']; es el id de la categoria que enviamos en un input que esta oculto
        $subcategoria->producto_categoria_id = $request['id'];
        $subcategoria->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Sub-Categoria Creada');
       return Redirect::back();
    }



    public function update(Request $request, $id)
    {

        $subcategoria=ProductoCategoriaSub::find($id);
        $subcategoria->nombre = $request['nombre'];
        $subcategoria->slug = str_slug($request['nombre']);
        $subcategoria->icono = $request['icono'];
        $subcategoria->producto_categoria_id = $request['producto_categoria_id'];
        $subcategoria->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Sub-Categoria Modificada');
        return Redirect::back();
    }


    public function destroy($id)
    {
            //ponemos todos los productos con categoria_id en null
      /*  $productos = Producto::where('categoriasub_id','=',$id)->get();
        foreach ($productos as $producto) {
            $producto->categoriasub_id = null;
            $producto->save();
        }*/

         //si hay algun producto usando la categoria que no me deje eliminar
        $producto = Producto::where('producto_categoria_sub_id','=',$id)->first();
        if (!empty($producto)) {
            flash('error al eliminar - hay productos que estan relacionados a esta SubCategoria')->error();
            return Redirect::back();
        }


        $subcategoria=ProductoCategoriaSub::find($id);
        $subcategoria->delete();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Sub-Categoria Eliminada');
         return Redirect::back();
    }
}
