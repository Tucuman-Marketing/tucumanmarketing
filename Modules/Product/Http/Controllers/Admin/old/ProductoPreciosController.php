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
use Modules\Productos\Entities\ProductoDolar;


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

class ProductoPreciosController extends AdminBaseController
{

    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }






/*----------------------------PRECIOS--------------------------*/
    public function Precios(){

      //eliminamos alguna session previa;
      \Session::forget('checkbox');

      $marcas = ProductoMarcas::all();
      $categorias = ProductoCategoria::pluck('nombre','id');
      return view('productos::admin.producto.precios.index',compact('marcas','categorias'));
    }




    // public function PreciosFiltrar(Request $request){

    //     //eliminamos alguna session previa
    //     \Session::forget('checkbox');

    //     $marcas = ProductoMarcas::all();
    //     $categorias = ProductoCategoria::all();
    //     $subcategoria = ProductoCategoriaSub::all();


    //     //filtrado por categoria
    //     if(!empty($request['categoria_id']) and !empty($request['categoriasub_id'])){
    //     //categoria y sub categorias seleccionadas
    //     $idcategoria = $request['categoria_id'];
    //     $idsubcategoria = $request['categoriasub_id'];
    //    return view('productos::admin.producto.precios.filtrar-categoria',compact('subcategoria','marcas','categorias','idcategoria','idsubcategoria'));
    //     }


    //     //filtrado por Marcas
    //     if(!empty($request['marca_id'])){
    //     //categoria y sub categorias seleccionadas
    //     $idmarca = $request['marca_id'];
    //        return view('productos::admin.producto.precios.filtrar-marca',compact('subcategoria','marcas','categorias','idmarca'));
    //     }


    //     return redirect()->route('producto.precios');

    // }






    // public function PreciosFiltrarCategoria($categoria,$subcategoria){
    //   $list = Producto::where('producto_categoria_id','=',$categoria)->where('producto_categoria_sub_id','=',$subcategoria)->get();
    //   return datatables()->of($list)->toJson();
    // }


    // public function PreciosFiltrarMarcas($marca){
    //  $list = Producto::where('producto_marca_id','=',$marca)->get();
    //  return datatables()->of($list)->toJson();
    // }




public function PreciosModificar(Request $request){


    $dolar = ProductoDolar::orderBy('created_at', 'desc')->first();
    $productos =$request['productos'];
    $porcentaje = 1+($request['porcentaje']/100);



    if (!empty($productos)) {
       foreach ($productos as  $producto) {

$item = Producto::find($producto);
$rentabilidad = 1+($item->rentabilidad/100);
$iva = 1+($item->iva/100);


//TODO , FALTARIA LA LOGICA DE NECGOCIOS
$item->precio_costo_dolar_s_iva = $item->precio_costo_dolar_s_iva*$porcentaje;
$item->precio_costo_dolar_c_iva = $item->precio_costo_dolar_s_iva*$iva;
$item->precio_venta_dolar_s_iva = $item->precio_costo_dolar_s_iva*$rentabilidad;
$item->precio_venta_dolar_c_iva = $item->precio_costo_dolar_c_iva*$rentabilidad;
$item->precio_tachado_dolar = (1+(($item->rentabilidad/2)/100))*$item->precio_venta_dolar_c_iva;


$item->precio_costo_pesos_s_iva = $item->precio_costo_dolar_s_iva*$dolar->dolar;
$item->precio_costo_pesos_c_iva = $item->precio_costo_dolar_c_iva*$dolar->dolar;
$item->precio_venta_pesos_s_iva = $item->precio_venta_dolar_s_iva*$dolar->dolar;
$item->precio_venta_pesos_c_iva = $item->precio_venta_dolar_c_iva*$dolar->dolar;
$item->precio_tachado_pesos = $item->precio_tachado_dolar*$dolar->dolar;


$item->save();

        }

     Alert::success('OK!!', 'Productos modificados');
     return redirect::back();
  }else{
     Alert::error('UPs!!', 'No se selecciono ningun producto');
     return redirect::back();
  }
}
/*----------------------------PRECIOS--------------------------*/










}
