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
use Modules\Productos\Http\Requests\ComboCreateRequest;
use Modules\Productos\Http\Requests\ComboUpdateRequest;

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
use Modules\Productos\Entities\ProductoComboProducto;

//Traits
use Modules\Productos\Traits\ComboTotales;
use Modules\Productos\Traits\ComboItemCart;
use Modules\Productos\Traits\ComboActualizar;
use Modules\Productos\Traits\Imagen;

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
use NumerosEnLetras;
use Cart;


class ProductoComboController extends AdminBaseController
{

    //cargamos los traits
    use   ComboActualizar , ComboItemCart , ComboTotales , Imagen;

     public function __construct()
    {
        //creo una session ventas
        if(!\Session::has('combo')) \Session::put('combo', array());

         //creo una session para el descuto final en pesos
        if(!\Session::has('descuento_pesos')) \Session::put('descuento_pesos');

        //para que funcione el constructor de AdminBaseController
        parent::__construct();

    }


//-------------------SECCION DEL PRODUCTOS COMBOS------------------------------//



//=========================LISTAR=============================//
    public function ProductosCombo(Request $request)
    {
        $list=producto::where('producto_combo','=',1)->first();

        return view('productos::admin.producto.producto-combo.index');
    }


    public function ProductosComboDatatable(Request $request)
    {
       //muestro todos los productos menos los que son combos
        $list=producto::where('producto_combo','=',1)->get();
         foreach ($list as $key => $ProductoCombo) {
            $stock = $ProductoCombo->CalcularStockCombo($ProductoCombo);
            $ProductoCombo->stockactual = $stock;
            $ProductoCombo->save();
        }



        return Datatables::of($list)->make(true);
    }
//=========================LISTAR=============================//






    public function show(Request $request)
    {
      //  if ($request->ajax()) {
         /*obtengo mi variable de session cart que cree y la almaceno en $cart */
        $cart = Cart::session('combo')->getContent();

        $cartcount = $this->CartCount($cart);
        $totalDescuento = $this->totalDescuento($cart);
        //$totalDescuento2 = $this->totalDescuento2($cart);
        $iva = $this->Iva($cart);
        $TotalSinIva = $this->TotalSinIva($cart);
        $TotalConIva = $this->TotalConIva($cart);

        $total = $TotalConIva-$totalDescuento;
        //$total2 = $this->total2($totalDescuento,$TotalConIva);


        //binificacion 2
        $bonificacion2 = \Session::get('descuento_pesos');
        if (isset($bonificacion2['descuento_pesos'])) {
            $bonifi2 = $bonificacion2['descuento_pesos'];
        }else{
            $bonifi2 = 0;
        }



        return response([$total,$cartcount,$cart,$totalDescuento,$iva,$TotalConIva,$bonifi2,$TotalSinIva]);

      //    }


    }


    //agregar item
    public function add(Request $request,$id,$cantidad,$descuento)
    {
       //si es una peticion ajax
        //if ($request->ajax()) {
        $itemadd  = producto::find($id);
        $cart = $this->AddItemCart($request,$itemadd,$cantidad,$descuento);
        return response(['ok']);
        //}

     }



    // Update item
    public function update(Request $request,$id, $cantidad)
    {
       if ($request->ajax()) {
            $itemadd  = producto::find($id);
            $cart = $this->UpdateItemCart($request,$cantidad,$itemadd);
            return response(['ok']);
        }
    }




    // Delete item y client
    public function delete(Request $request,$id)
    {
      //si es una peticion ajax
        if ($request->ajax()) {
            $item  = producto::find($id);
            Cart::session('combo')->remove($item->id);
            return response(['ok']);
        }
    }


    //limpiar carrito
     public function trash()
    {
        $cart = Cart::session('combo')->clear();
        return Redirect::back();
    }


    //descuento en pesos
    public function DescuentoEnPesos(Request $Request,$descuentopesos){
            $this->DescuentoPesos($descuentopesos);
    }


    //devuelve los datos del producto seleccionado en la datatable
    public function DatosDelProducto(Request $request,$id){
        if ($request->ajax()) {
             $producto = Producto::find($id);
            return response($producto);
        }
    }






    public function ComboCreate()
    {

        $categorias = ProductoCategoria::pluck('nombre','id');
        $categoriasub = ProductoCategoriaSub::pluck('nombre','id');
        $rubros=ProductoRubros::pluck('descripcion','id');
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $ivatipos=ProductoIva::pluck('descripcion','descripcion');
        $provedores=ProductoProvedores::pluck('razonsocial','id');
        $dolar = ProductoDolar::orderBy('id','DESC')->first();

        return view('productos::admin.producto.producto-combo.create-combo',compact('categorias','provedores','marcas','rubros','ivatipos','dolar'));

    }





    public function ComboStore(ComboCreateRequest $request)
    {

     $ProductoCombo = new Producto;
     $ProductoCombo->codigo = $request['codigo'];
     $ProductoCombo->descripcion = $request['descripcion'];
     $ProductoCombo->slug = Str::slug($request['descripcion']);
     $ProductoCombo->puntos = $request['puntos'];
     $ProductoCombo->producto_categoria_id = $request['producto_categoria_id'];
     $ProductoCombo->producto_categoria_sub_id = $request['producto_categoria_sub_id'];
     $ProductoCombo->descripcioncorta = $request['descripcioncorta'];
     $ProductoCombo->descripcionlarga = $request['descripcionlarga'];
     $ProductoCombo->habilitado = $request['habilitado'];
     $ProductoCombo->habilitado_add_cart = $request['habilitado_add_cart'];
     $ProductoCombo->producto_oferta_id = $request['oferta'];
     $ProductoCombo->hot = $request['hot'];
     $ProductoCombo->producto_combo = 1;

     /*-------------------------PRECIOS------------------------*/
    $dolar = DB::table('producto_dolars')->orderBy('id','DESC')->first();
     $precio_costo_dolar_s_iva = 0;
       $precio_costo_dolar_c_iva = 0;
       $precio_costo_dolar_c_iva = 0;
       $precio_venta_dolar_s_iva = 0;
       $precio_venta_dolar_c_iva = 0;
       $precio_tachado_dolar = 0;

       $precio_costo_pesos_s_iva = 0;
       $precio_costo_pesos_c_iva = 0;
       $precio_venta_pesos_s_iva = 0;
       $precio_venta_pesos_c_iva = 0;
       $precio_tachado_pesos = 0 ;

    $cart = Cart::session('combo')->getContent();
        foreach ($cart as $item) {
        $precio_costo_dolar_s_iva+=$item->attributes->precio_costo_dolar_s_iva*$item->quantity;
        $precio_costo_dolar_c_iva+=$item->attributes->precio_costo_dolar_c_iva*$item->quantity;
        $precio_venta_dolar_s_iva+=$item->attributes->precio_venta_dolar_s_iva*$item->quantity;
        $precio_venta_dolar_c_iva+=$item->attributes->precio_venta_dolar_c_iva*$item->quantity;

        $precio_costo_pesos_s_iva+=$item->attributes->precio_costo_pesos_s_iva*$item->quantity;
        $precio_costo_pesos_c_iva+=$item->attributes->precio_costo_pesos_c_iva*$item->quantity;
        $precio_venta_pesos_s_iva+=$item->attributes->precio_venta_pesos_s_iva*$item->quantity;
        $precio_venta_pesos_c_iva+=$item->attributes->precio_venta_pesos_c_iva*$item->quantity;
      }

    $ProductoCombo->precio_costo_pesos_s_iva = $precio_costo_pesos_s_iva;
    $ProductoCombo->precio_costo_pesos_c_iva = $precio_costo_pesos_c_iva;
    $ProductoCombo->precio_venta_pesos_s_iva = $precio_venta_pesos_s_iva;
    $ProductoCombo->precio_venta_pesos_c_iva = $precio_venta_pesos_c_iva;
    $ProductoCombo->precio_tachado_pesos = $precio_venta_pesos_c_iva*1.15;

    $ProductoCombo->precio_costo_dolar_s_iva = $precio_costo_dolar_s_iva;
    $ProductoCombo->precio_costo_dolar_c_iva = $precio_costo_dolar_c_iva;
    $ProductoCombo->precio_venta_dolar_s_iva = $precio_venta_dolar_s_iva;
    $ProductoCombo->precio_venta_dolar_c_iva = $precio_venta_dolar_c_iva;
    $ProductoCombo->precio_tachado_dolar = $precio_venta_dolar_c_iva*1.15;
    $ProductoCombo->save();
    /*-------------------------PRECIOS------------------------*/

    /*-------CARGA DE IMAGEN-----------*/
    $ProductoCombo = $this->ImagenCreate($request,$ProductoCombo);
    /*-------CARGA DE IMAGEN-----------*/


    /*-------CARGA TODOS LOS PRODUCTOS QUE FORMAN EL COMBO-----------*/
    //traigo todos los productos de la session  del usuario
    $descripcionLarga = "";
        $cart = Cart::session('combo')->getContent();
        //los recorro
        foreach ($cart as $item) {
            //descuento neto
            // $descuento = $item->descuento/100;
            // $descuento_neto = (($item->precio_venta_pesos_c_iva*$item->quantity)*$descuento);

            // //iva neto
            // $iva = ($item->precio_venta_pesos_s_iva*$item->quantity)*($item->iva/100);
            $descripcionLarga = $descripcionLarga.
            "<li><img src='". url('/')."/".$item->attributes->imagen."' alt='' class='' width='85'><a href='".url('/')."/producto-detalle-".$item->attributes->slug."'>".$item->quantity." X ".$item->name."</a></li>";

            $ComboProducto  = new ProductoComboProducto();
            $ComboProducto->producto_combos_id    = $ProductoCombo->id;
            $ComboProducto->producto_id  = $item->id;
            $ComboProducto->cantidad  = $item->quantity;
            $ComboProducto->descuento  = $item->attributes->descuento;
            $ComboProducto->save();
        }

        //limpiamos el carrito
         Cart::session('combo')->clear();


         //guardamos en la descripcion laraga la descripcion de todos los productos
        $ProductoCombo->descripcionlarga = $ProductoCombo->descripcionlarga . "<br><br><br>"."<h2>Componentes:</h2><ul>".$descripcionLarga."</ul>";
        $ProductoCombo->save();
    /*-------CARGA TODOS LOS PRODUCTOS QUE FORMAN EL COMBO-----------*/



        //cuando no se coloca nada en la descripcion larga automaticamente se colocan la descripcion larga de cada producto
        // if ($request['descripcionlarga'] == null ) {
        //     $producto->descripcionlarga = $gab->descripcionlarga.$mot->descripcionlarga.$mou->descripcionlarga.$tec->descripcionlarga.$vid->descripcionlarga.$pro->descripcionlarga.$fue->descripcionlarga.$dis->descripcionlarga.$mem->descripcionlarga;
        //     $producto->save();
        // }else{
        //     $producto->descripcionlarga =$request['descripcionlarga'];
        //     $producto->save();
        // }

         Alert::success('Mensaje existoso', 'Combo Creado');
        return redirect()->route('producto.combo');
    }







    public function ComboEdit(Request $request,Producto $ProductoCombo)
    {
        $categorias = ProductoCategoria::pluck('nombre','id');
        $categoriasub = ProductoCategoriaSub::pluck('nombre','id');

        //limpiamos el presupuesto
        Cart::session('combo')->clear();
        //instanciamos una nueva session vacia
        $cart = Cart::session('combo')->getContent();
        $detalles = $ProductoCombo->combos;
        foreach ($detalles as $key => $detalle) {
            $itemadd = Producto::find($detalle->producto->id);
          $cart = $this->AddItemCart($request,$itemadd,$detalle->cantidad,$detalle->descuento);
        }


        return view('productos::admin.producto.producto-combo.edit-combo',compact('categoriasub','categorias','ProductoCombo'));
    }







    public function ComboUpdate(Request $request, Producto $ProductoCombo)
    {


     //$producto = $ProductoCombo;

    /*-------CARGA DE IMAGEN-----------*/
        $this->ImagenUpdate($request,$ProductoCombo);
    /*-------CARGA DE IMAGEN-----------*/




     $ProductoCombo->codigo = $request['codigo'];
     $ProductoCombo->descripcion = $request['descripcion'];
     $ProductoCombo->slug = Str::slug($request['descripcion']);
     $ProductoCombo->puntos = $request['puntos'];
     $ProductoCombo->producto_categoria_id = $request['producto_categoria_id'];
     $ProductoCombo->producto_categoria_sub_id = $request['producto_categoria_sub_id'];
     $ProductoCombo->descripcioncorta = $request['descripcioncorta'];
     $ProductoCombo->descripcionlarga = $request['descripcionlarga'];
     $ProductoCombo->habilitado = $request['habilitado'];
     $ProductoCombo->habilitado_add_cart = $request['habilitado_add_cart'];
     $ProductoCombo->producto_oferta_id = $request['oferta'];
     $ProductoCombo->hot = $request['hot'];


     /*-------------------------PRECIOS------------------------*/
    $dolar = DB::table('producto_dolars')->orderBy('id','DESC')->first();
     $precio_costo_dolar_s_iva = 0;
       $precio_costo_dolar_c_iva = 0;
       $precio_costo_dolar_c_iva = 0;
       $precio_venta_dolar_s_iva = 0;
       $precio_venta_dolar_c_iva = 0;
       $precio_tachado_dolar = 0;

       $precio_costo_pesos_s_iva = 0;
       $precio_costo_pesos_c_iva = 0;
       $precio_venta_pesos_s_iva = 0;
       $precio_venta_pesos_c_iva = 0;
       $precio_tachado_pesos = 0 ;

     $cart = Cart::session('combo')->getContent();
        foreach ($cart as $item) {
        $precio_costo_dolar_s_iva+=$item->attributes->precio_costo_dolar_s_iva*$item->quantity;
        $precio_costo_dolar_c_iva+=$item->attributes->precio_costo_dolar_c_iva*$item->quantity;
        $precio_venta_dolar_s_iva+=$item->attributes->precio_venta_dolar_s_iva*$item->quantity;
        $precio_venta_dolar_c_iva+=$item->attributes->precio_venta_dolar_c_iva*$item->quantity;

        $precio_costo_pesos_s_iva+=$item->attributes->precio_costo_pesos_s_iva*$item->quantity;
        $precio_costo_pesos_c_iva+=$item->attributes->precio_costo_pesos_c_iva*$item->quantity;
        $precio_venta_pesos_s_iva+=$item->attributes->precio_venta_pesos_s_iva*$item->quantity;
        $precio_venta_pesos_c_iva+=$item->attributes->precio_venta_pesos_c_iva*$item->quantity;
      }

    $ProductoCombo->precio_costo_pesos_s_iva = $precio_costo_pesos_s_iva;
    $ProductoCombo->precio_costo_pesos_c_iva = $precio_costo_pesos_c_iva;
    $ProductoCombo->precio_venta_pesos_s_iva = $precio_venta_pesos_s_iva;
    //total con descuento ya aplicado
    $ProductoCombo->precio_venta_pesos_c_iva = $precio_venta_pesos_c_iva;
    $ProductoCombo->precio_tachado_pesos = $precio_venta_pesos_c_iva*1.15;

    $ProductoCombo->precio_costo_dolar_s_iva = $precio_costo_dolar_s_iva;
    $ProductoCombo->precio_costo_dolar_c_iva = $precio_costo_dolar_c_iva;
    $ProductoCombo->precio_venta_dolar_s_iva = $precio_venta_dolar_s_iva;
    //total con descuento ya aplicado
    $ProductoCombo->precio_venta_dolar_c_iva = $precio_venta_dolar_c_iva;
    $ProductoCombo->precio_tachado_dolar = $precio_venta_dolar_c_iva*1.15;
    $ProductoCombo->save();
    /*-------------------------PRECIOS------------------------*/



       //que me borre las transacciones anterioes y me cargue las nuevas.
        foreach ($ProductoCombo->combos as $key => $detalle) {
            $detalle->delete();
        }



        // //traigo todos los productos de la session combo
        // $cart = Cart::session('combo')->getContent();
        // //los recorro
        // foreach ($cart as $item) {
        //     $ComboProducto  = new ProductoComboProducto();
        //     $ComboProducto->producto_combos_id    = $ProductoCombo->id;
        //     $ComboProducto->producto_id  = $item->id;
        //     $ComboProducto->cantidad  = $item->quantity;
        //     $ComboProducto->descuento  = $item->descuento;
        //     $ComboProducto->save();
        // }


        // //limpiamos el carrito
        //  Cart::session('combo')->clear();


         /*-------CARGA TODOS LOS PRODUCTOS QUE FORMAN EL COMBO-----------*/
    //traigo todos los productos de la session  del usuario
    $descripcionLarga = "";
        $cart = Cart::session('combo')->getContent();

        //los recorro
        foreach ($cart as $item) {
            //descuento neto
            // $descuento = $item->descuento/100;
            // $descuento_neto = (($item->precio_venta_pesos_c_iva*$item->quantity)*$descuento);

            // //iva neto
            // $iva = ($item->precio_venta_pesos_s_iva*$item->quantity)*($item->iva/100);
            $descripcionLarga = $descripcionLarga.
            "<li><img src='". url('/')."/".$item->attributes->imagen."' alt='' class='' width='85'><a href='".url('/')."/producto-detalle-".$item->attributes->slug."'>".$item->quantity." X ".$item->name."</a></li>";


            $ComboProducto  = new ProductoComboProducto();
            $ComboProducto->producto_combos_id    = $ProductoCombo->id;
            $ComboProducto->producto_id  = $item->id;
            $ComboProducto->cantidad  = $item->quantity;
            $ComboProducto->descuento  = $item->attributes->descuento;
            $ComboProducto->save();
        }

        //limpiamos el carrito
         Cart::session('combo')->clear();


         //guardamos en la descripcion laraga la descripcion de todos los productos
        $ProductoCombo->descripcionlarga = "<br><br><br>"."<h2>Componentes:</h2><ul>".$descripcionLarga."</ul>";
        $ProductoCombo->save();
    /*-------CARGA TODOS LOS PRODUCTOS QUE FORMAN EL COMBO-----------*/

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Combo Modificado');
       return redirect()->route('producto.combo');
    }



    public function ComboDestroy(Request $request)
    {

        //buscamos el combo a eliminar
         $producto =Producto::where('uuid','=',$request['uuid'])->first();

         //eliminamos los items del combo
         foreach ($producto->combos as $key => $item) {
           $item->delete();
         }

         //eliminamos la imagen de portadad
         \File::deleteDirectory(public_path().'/storage/'."productos/".$producto->uuid);

         //eliminamos el combo
         $producto->delete();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Combo Eliminado');
        return Redirect::back();

    }
//----------------------------SECCION DEL PRODUCTOS COMBOS------------------------------//







}
