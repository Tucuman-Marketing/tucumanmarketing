<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//controller AdminBase
use App\Http\Controllers\AdminBaseController;

//Request
use Modules\Productos\Http\Requests\ProductoCreateRequest;
use Modules\Productos\Http\Requests\ProductoUpdateRequest;


//model
use Modules\Productos\Entities\ProductoCategoria;
use Modules\Productos\Entities\ProductoCategoriaSub;
use Modules\Productos\Entities\ProductoImagen;
use Modules\Productos\Entities\ProductoIva;
use Modules\Productos\Entities\ProductoMarcas;
use Modules\Productos\Entities\Producto;
use Modules\Productos\Entities\ProductoProductoTag;
use Modules\Productos\Entities\ProductoProvedores;
use Modules\Productos\Entities\ProductoReviews;
use Modules\Productos\Entities\ProductoRubros;
use Modules\Productos\Entities\ProductoTag;
use Modules\Productos\Entities\ProductoDolar;
use Modules\Productos\Entities\ProductoCombos;
use Modules\Productos\Entities\ProductoComboProducto;
use Modules\Productos\Entities\ProductoOferta;

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


class ProductoListarController extends AdminBaseController
{


    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }



    public function index(Request $request)
    {   dd("ok");
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $categorias = ProductoCategoria::pluck('nombre','id');
        return view('productos::admin.producto.producto.index',compact('categorias','marcas'));
    }


    public function indexDatatable(Request $request)
    {
       //muestro todos los productos menos los que son combos
        $list=producto::where('habilitado','=','on')->orderBy('descripcion', 'des')->where('producto_combo','=',null)->get();
        return Datatables::of($list)->make(true);
    }



    public function ProductoFiltrar(Request $request,$producto,$categoria,$subcategoria,$marca)
    {

        /*==========================FILTRO PRODUCTOS ALL=====================*/
        if ($producto == 'all-datatable') {

                $list=producto::where('producto_combo','=',null)->get();

                if ($categoria != "null") {
                    $list=producto::where('producto_combo','=',null)
                    ->where('producto_categoria_id','=',$categoria)->get();
                }

                if ($marca != "null") {
                    $list=producto::where('producto_combo','=',null)
                    ->where('producto_marca_id','=',$marca)->get();
                }

                if ($categoria != "null"  and $subcategoria != "null") {
                    $list=producto::where('producto_combo','=',null)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->get();
                }

                if ($categoria != "null" and $marca != "null" and $subcategoria != "null") {
                    $list=producto::where('producto_combo','=',null)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->where('producto_marca_id','=',$marca)->get();
                }

                return Datatables::of($list)->make(true);
        }
        /*==========================FILTRO PRODUCTOS ALL=====================*/



        /*==========================FILTRO PRODUCTOS DESABILITADOSS=====================*/
        if ($producto == 'desabilitado-datatable') {
            $list = producto::where('habilitado','=',null)->get();
            if ($categoria != "null") {
                    $list=producto::where('habilitado','=',null)
                    ->where('producto_categoria_id','=',$categoria)->get();
                }

                if ($marca != "null") {
                    $list=producto::where('habilitado','=',null)
                    ->where('producto_marca_id','=',$marca)->get();
                }

                if ($categoria != "null" and $marca != "null") {
                    $list=producto::where('habilitado','=',null)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_marca_id','=',$marca)->get();
                }


                return Datatables::of($list)->make(true);
        }
        /*==========================FILTRO PRODUCTOS DESABILITADOSS=====================*/



        /*==========================FILTRO PRODUCTOS STOCK=====================*/
        if ($producto == 'stock-datatable') {
            $list = producto::where('stockactual','>=',1)->get();
            if ($categoria != "null") {
                    $list=producto::where('stockactual','>=',1)
                    ->where('producto_categoria_id','=',$categoria)->get();
                }

                if ($marca != "null") {
                    $list=producto::where('stockactual','>=',1)
                    ->where('producto_marca_id','=',$marca)->get();
                }

                if ($categoria != "null" and $marca != "null") {
                    $list=producto::where('stockactual','>=',1)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_marca_id','=',$marca)->get();
                }

                return Datatables::of($list)->make(true);
        }
        /*==========================FILTRO PRODUCTOS STOCK=====================*/


        /*==========================FILTRO PRODUCTOS OFERTA=====================*/
        if ($producto == 'oferta-datatable') {
            $list= producto::where('producto_oferta_id','!=',null)->get();
            if ($categoria != "null") {
                    $list=producto::where('producto_oferta_id','=',null)
                    ->where('producto_categoria_id','=',$categoria)->get();
                }

                if ($marca != "null") {
                    $list=producto::where('producto_oferta_id','=',null)
                    ->where('producto_marca_id','=',$marca)->get();
                }

                if ($categoria != "null" and $marca != "null") {
                    $list=producto::where('producto_oferta_id','=',null)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_marca_id','=',$marca)->get();
                }

                return Datatables::of($list)->make(true);
        }
        /*==========================FILTRO PRODUCTOS OFERTA=====================*/



        /*==========================FILTRO PRODUCTOS STOCKCRIIICO=====================*/
        if ($producto == 'stockcritico-datatable') {

                $list = DB::table('productos')->whereRaw('productos.stockactual <= productos.stockcritico') ->get();

                if ($categoria != "null") {
                    $list = DB::table('productos')
                    ->whereRaw('productos.stockactual <= productos.stockcritico')
                    ->where('producto_categoria_id','=',$categoria)
                    ->orderBy('descripcion', 'des')
                    ->get();
                }

                if ($marca != "null") {
                    $list = DB::table('productos')
                    ->whereRaw('productos.stockactual <= productos.stockcritico')
                    ->where('producto_marca_id','=',$marca)
                    ->orderBy('descripcion', 'des')
                    ->get();
                }


                if ($categoria != "null" and $marca != "null") {
                    $list = DB::table('productos')
                    ->whereRaw('productos.stockactual <= productos.stockcritico')
                    ->where('producto_categoria_id','=',$categoria)
                    ->where('producto_marca_id','=',$marca)
                    ->orderBy('descripcion', 'des')
                    ->get();
                }

                return Datatables::of($list)->make(true);
        }
        /*==========================FILTRO PRODUCTOS STOCKCRIIICO=====================*/


        /*==========================FILTRO PRODUCTO COMBO=====================*/
        if ($producto == 'combo-datatable') {

                $list=producto::where('producto_combo','!=',null)->get();

                if ($categoria != "null") {
                    $list=producto::where('producto_combo','!=',null)
                    ->where('producto_categoria_id','=',$categoria)->get();
                }

                if ($marca != "null") {
                    $list=producto::where('producto_combo','!=',null)
                    ->where('producto_marca_id','=',$marca)->get();
                }

                if ($categoria != "null"  and $subcategoria != "null") {
                    $list=producto::where('producto_combo','!=',null)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->get();
                }

                if ($categoria != "null" and $marca != "null" and $subcategoria != "null") {
                    $list=producto::where('producto_combo','!=',null)
                    ->where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->where('producto_marca_id','=',$marca)->get();
                }

                return Datatables::of($list)->make(true);
        }
        /*==========================FILTRO PRODUCTO COMBO=====================*/



    }



































    public function ProductoReview(Request $request)
    {

        $rubros=ProductoRubros::pluck('descripcion','id');
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $ivatipos=ProductoIva::pluck('descripcion','descripcion');
        $provedores=ProductoProvedores::pluck('razonsocial','id');
        $categoriasub = ProductoCategoriaSub::pluck('nombre','id');
        $categorias = ProductoCategoria::pluck('nombre','id');


        $reviews = ProductoReviews::orderBy('id','desc')->paginate(10);
        $count= ProductoReviews::where('approved','=',1)->count();
        return view('productos::admin.producto.listar.review-aprobados',compact('count','categoriasub','categorias','reviews','rubros','marcas','ivatipos','provedores'));
    }



     public function ReturnSubCategorias(Request $request,$id)
    {
        $subcategorias = categoriasub::where('categoria_id','=', $id)->get();
        return Response($subcategorias);
    }









}
