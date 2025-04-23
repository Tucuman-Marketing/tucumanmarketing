<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;

//controller AdminBase
use App\Http\Controllers\AdminBaseController;

use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;

use Illuminate\Support\Facades\Input;

//Request
use Modules\Productos\Http\Requests\ProductoCreateRequest;
use Modules\Productos\Http\Requests\ProductoUpdateRequest;


//model
use Modules\Productos\Entities\ProductoCategoria;
use Modules\Productos\Entities\ProductoCategoriaSub;
use Modules\Productos\Entities\ProductoCombos;
use Modules\Productos\Entities\ProductoImagen;
use Modules\Productos\Entities\ProductoIva;
use Modules\Productos\Entities\ProductoMarcas;
use Modules\Productos\Entities\Producto;
use Modules\Productos\Entities\ProductoProductoTag;
use Modules\Productos\Entities\ProductoProvedores;
use Modules\Productos\Entities\ProductoReviews;
use Modules\Productos\Entities\ProductoRubros;
use Modules\Productos\Entities\ProductoTag;

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
use PDFsnappy;
use SnappyImage;

class ProductoCodigoDeBarrasController extends AdminBaseController
{

   public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }


/*----------------------------CODIGO DE BARRAS--------------------------*/

    public function CodigoDeBarrasFiltrar(Request $request)
    {
         $categorias = ProductoCategoria::pluck('nombre','id');
         $productos = Producto::all();
         $marcas = ProductoMarcas::all();
         $link = "productos codigos";
         return view('productos::admin.producto.codigo-de-barras.index',compact('link','categorias','productos','marcas'));
    }


    // public function GenerarCodigoDeBarras(Request $request)
    // {


    //     $categoria = $request['producto_categoria_id'];
    //     $subcategoria = $request['producto_categoria_sub_id'];
    //     $marca = $request['marca_id'];



    //             $productos=producto::where('producto_combo','=',null)->get();

    //             if ($categoria != "null") {
    //                 $productos=producto::where('producto_combo','=',null)
    //                 ->where('producto_categoria_id','=',$categoria)->get();
    //             }

    //             if ($marca != "null") {
    //                 $productos=producto::where('producto_combo','=',null)
    //                 ->where('producto_marca_id','=',$marca)->get();
    //             }

    //             if ($categoria != "null"  and $subcategoria != "null") {
    //                 $productos=producto::where('producto_combo','=',null)
    //                 ->where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->get();
    //             }

    //             if ($categoria != "null" and $marca != "null" and $subcategoria != "null") {
    //                 $productos=producto::where('producto_combo','=',null)
    //                 ->where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->where('producto_marca_id','=',$marca)->get();
    //             }

    // $tipo=1;

    // return $this->crearCodigoPDF($productos,$tipo);

    // }






    public function GenerarCodigoDeBarrasSeleccionados(Request $request)
    {


        if ($request['productos'] == null) {
           Alert::error('Ups!!', 'No selecciono ningun producto');
           return Redirect::back();
        }

        foreach ($request['productos'] as $key => $producto) {
            $producto = Producto::find((int)$producto);
            $array[$key] = $producto;
        }

    $productos = $array;
    $tipo= (int)$request['pdf'];
    return $this->crearCodigoPDF($productos,$tipo);

    }





    public function crearCodigoPDF($productos,$tipo){

        $date = date('Y-m-d');
        $vistaurl="productos::admin.producto.codigo-de-barras.generar-barras-pdf";
        $view =  \View::make($vistaurl, compact( 'date','productos'))->render();
        $pdf = PDFsnappy::loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte.pdf');}
        if($tipo==2){return $pdf->download('reporte.pdf');}


    }
/*----------------------------CODIGO DE BARRAS--------------------------*/






}
