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
use Modules\Productos\Http\Requests\ProductoOfertaRequest;

//model
use Modules\Productos\Entities\ProductoCategoria;
use Modules\Productos\Entities\ProductoCategoriaSub;
use Modules\Productos\Entities\ProductoCombos;
use Modules\Productos\Entities\ProductoComboProducto;
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
use Modules\Productos\Entities\ProductoOferta;

use Modules\Ventas\Entities\VentaDetalle;
use Modules\Compras\Entities\CompraDetalle;


//Traits
use Modules\Productos\Traits\Tags;
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
use Uuid;
use cart;

class ProductoController extends AdminBaseController
{
  use Tags,ComboActualizar , Imagen;

     public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }


//----------------------------SECCION DEL PRODUCTOS------------------------------//

    public function create()
    {
        $categorias = ProductoCategoria::pluck('nombre','id');
        $rubros=ProductoRubros::pluck('descripcion','id');
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $ivatipos=ProductoIva::pluck('descripcion','descripcion');
        $provedores=ProductoProvedores::pluck('razonsocial','id');
        $dolar = ProductoDolar::orderBy('id','DESC')->first();
        return view('productos::admin.producto.producto.create',compact('categorias','provedores','marcas','rubros','ivatipos','dolar'));
    }






    public function store(ProductoCreateRequest $request)
    {

      $producto = new Producto;
      $producto->codigo = $request['codigo'];
      $producto->descripcion = $request['descripcion'];
      $producto->slug = Str::slug($request['descripcion']);



     /*----PRECIOS----*/
      $producto->precio_costo_dolar_s_iva = $request['precio_costo_dolar_s_iva'];
      $producto->precio_costo_dolar_c_iva = $request['precio_costo_dolar_c_iva'];
      $producto->precio_venta_dolar_s_iva = $request['precio_venta_dolar_s_iva'];
      $producto->precio_venta_dolar_c_iva = $request['precio_venta_dolar_c_iva'];
      //se le agrega un % , que es la midad de la rentabilidad
      $producto->precio_tachado_dolar = $request['precio_tachado_dolar'];

      $producto->precio_costo_pesos_s_iva = $request['precio_costo_pesos_s_iva'];
      $producto->precio_costo_pesos_c_iva = $request['precio_costo_pesos_c_iva'];
      $producto->precio_venta_pesos_s_iva = $request['precio_venta_pesos_s_iva'];
      $producto->precio_venta_pesos_c_iva = $request['precio_venta_pesos_c_iva'];
      //se le agrega un % , que es la midad de la rentabilidad
      $producto->precio_tachado_pesos = $request['precio_tachado_pesos'];

      $producto->rentabilidad = $request['rentabilidad'];

       $producto->garantia = $request['garantia'];


      $producto->iva = $request['iva'];
      /*----PRECIOS----*/


         $producto->puntos = $request['puntos'];

         $producto->stockactual = $request['stockactual'];
         $producto->stockcritico = $request['stockcritico'];
         $producto->stockpedido = $request['stockpedido'];

         $producto->producto_rubro_id = $request['producto_rubro_id'];
         $producto->producto_marca_id = $request['producto_marca_id'];
         $producto->producto_provedore_id = $request['producto_provedore_id'];
         $producto->producto_categoria_id = $request['producto_categoria_id'];
         $producto->producto_categoria_sub_id = $request['producto_categoria_sub_id'];


         $producto->cod_alter = $request['cod_alter'];
         $producto->ubicacion = $request['ubicacion'];
         $producto->cod_bulto = $request['cod_bulto'];
         $producto->cant_bulto = $request['cant_bulto'];

         $producto->habilitado = $request['habilitado'];
         $producto->habilitado_add_cart = $request['habilitado_add_cart'];
         $producto->alerta = $request['alerta'];
         $producto->observaciones = $request['observaciones'];

         $producto->descripcioncorta = $request['descripcioncorta'];
         $producto->descripcionlarga = $request['descripcionlarga'];

         $producto->hot = $request['hot'];
         $producto->save();



      /*-------CARGA DE IMAGEN-----------*/
        $this->ImagenCreate($request,$producto);
      /*-------CARGA DE IMAGEN-----------*/

      /*-------CARGA DE TAGS-----------*/
      $this->AddTags($request,$producto);
      /*-------CARGA DE TAGS-----------*/


         Alert::success('Mensaje existoso', 'Producto Creado');
        return redirect()->route('producto');
    }




    public function show(Producto $producto)
    {

        $categorias = ProductoCategoria::pluck('nombre','id');
        $categoriasub = ProductoCategoriaSub::pluck('nombre','id');
        $rubros=ProductoRubros::pluck('descripcion','id');
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $ivatipos=ProductoIva::pluck('descripcion','descripcion');
        $provedores=ProductoProvedores::pluck('razonsocial','id');


        return view('productos::admin.producto.producto.ver',compact('categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto'));
    }





    public function edit(Producto $producto)
    {

        $categorias = ProductoCategoria::pluck('nombre','id');
        $categoriasub = ProductoCategoriaSub::pluck('nombre','id');
        $rubros=ProductoRubros::pluck('descripcion','id');
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $ivatipos=ProductoIva::pluck('descripcion','descripcion');
        $provedores=ProductoProvedores::pluck('razonsocial','id');
        $dolar = ProductoDolar::orderBy('id','DESC')->first();

        return view('productos::admin.producto.producto.edit',compact('categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto','dolar'));
    }






    public function update(ProductoUpdateRequest $request, $id)
    {


        $producto=producto::find($id);


      /*-------CARGA DE IMAGEN-----------*/
        $this->ImagenUpdate($request,$producto);
      /*-------CARGA DE IMAGEN-----------*/



         $producto->codigo = $request['codigo'];
         $producto->descripcion =$request['descripcion'];
         $producto->slug =Str::slug($request['descripcion']);

         $producto->iva_id=$request['iva_id'];

         /*----PRECIOS----*/
      $producto->precio_costo_dolar_s_iva = $request['precio_costo_dolar_s_iva'];
      $producto->precio_costo_dolar_c_iva = $request['precio_costo_dolar_c_iva'];
      $producto->precio_venta_dolar_s_iva = $request['precio_venta_dolar_s_iva'];
      $producto->precio_venta_dolar_c_iva = $request['precio_venta_dolar_c_iva'];
      $producto->precio_tachado_dolar = $request['precio_tachado_dolar'];

      $producto->precio_costo_pesos_s_iva = $request['precio_costo_pesos_s_iva'];
      $producto->precio_costo_pesos_c_iva = $request['precio_costo_pesos_c_iva'];
      $producto->precio_venta_pesos_s_iva = $request['precio_venta_pesos_s_iva'];
      $producto->precio_venta_pesos_c_iva = $request['precio_venta_pesos_c_iva'];
      $producto->precio_tachado_pesos = $request['precio_tachado_pesos'];

      $producto->rentabilidad = $request['rentabilidad'];

      $producto->garantia = $request['garantia'];

      $producto->iva = $request['iva'];
      /*----PRECIOS----*/


         $producto->puntos =$request['puntos'];

         $producto->stockactual =$request['stockactual'];
         $producto->stockcritico =$request['stockcritico'];
         $producto->stockpedido =$request['stockpedido'];

         $producto->producto_rubro_id = $request['producto_rubro_id'];
         $producto->producto_marca_id = $request['producto_marca_id'];
         $producto->producto_provedore_id = $request['producto_provedore_id'];
         $producto->producto_categoria_id = $request['producto_categoria_id'];
         $producto->producto_categoria_sub_id = $request['producto_categoria_sub_id'];

         $producto->cod_alter =$request['cod_alter'];
         $producto->ubicacion =$request['ubicacion'];
         $producto->cod_bulto =$request['cod_bulto'];
         $producto->cant_bulto =$request['cant_bulto'];

         $producto->alerta =$request['alerta'];
         $producto->observaciones =$request['observaciones'];
         $producto->usar_rentabili =$request['usar_rentabili'];
         $producto->descripcioncorta =$request['descripcioncorta'];
         $producto->descripcionlarga =$request['descripcionlarga'];
         $producto->usar_rentabili =$request['usar_rentabili'];
         $producto->hot =$request['hot'];
         $producto->habilitado = $request['habilitado'];
         $producto->habilitado_add_cart = $request['habilitado_add_cart'];
         $producto->save();



        //agregamos y comprobamos los tags
        $this->AddTags($request,$producto);

        //actualizamos el precio de los combos
        $this->ActualizarPrecioDelCombo();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Producto Modificado');
       return redirect()->route('producto');
    }





    public function destroy(Request $request)
    {

      $producto = Producto::where('uuid','=',$request['uuid'])->first();

      /*-------RELACION COMBO-----*/
      $combo = ProductoComboProducto::where('producto_id','=',$producto->id)->first();
      if(!empty($combo))
        {
          flash('no se pudo eliminar el producto , este producto esta asociado a un combo.')->error();
          Alert::error('Ups!!', 'Erro al eliminar el producto');
        }
      /*-------RELACION COMBO-----*/


      /*-------RELACION VENTA-----*/
      $venta = VentaDetalle::where('producto_id','=',$producto->id)->first();
      if(!empty($venta))
        {
          flash('no se pudo eliminar el producto , este producto esta asociado a una venta.')->error();
          Alert::error('Ups!!', 'Erro al eliminar el producto');
        }
      /*-------RELACION VENTA-----*/

      /*-------RELACION COMPRA-----*/
      $compra = CompraDetalle::where('producto_id','=',$producto->id)->first();
      if(!empty($compra))
        {
          flash('no se pudo eliminar el producto , este producto esta asociado a una Compra.')->error();
          Alert::error('Ups!!', 'Erro al eliminar el producto');
        }
      /*-------RELACION COMPRA-----*/

      if (!empty($compra) or !empty($venta) or !empty($combo)) {
       return Redirect::back();
      }



        //eliminamos la carpeta - LOCAL
        //Storage::deleteDirectory("productos/".$producto->uuid);
         //eliminamos la carpeta - HOSTING
        \File::deleteDirectory(public_path()."/storage/productos/".$producto->uuid);


        //eliminamos las relaciones (producto_imagenes)
        if (isset($producto->producto_imagenes)) {
           foreach ($producto->producto_imagenes as $key => $imagen) {
            $imagen->delete();
            }
        }

        //eliminamos las relaciones producto-Tags
        $producto->tags()->detach();

        //eliminamos los deseos de los usuiaros que tienen este producto
        $producto->deseos()->detach();


        //eliminamos el producto
        $producto->delete();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Producto Eliminado');
        return Redirect::back();
    }






    public function DuplicarProducto(Producto $producto)
    {

        $categorias = ProductoCategoria::pluck('nombre','id');
        $categoriasub = ProductoCategoriaSub::pluck('nombre','id');
        $rubros=ProductoRubros::pluck('descripcion','id');
        $marcas=ProductoMarcas::pluck('descripcion','id');
        $ivatipos=ProductoIva::pluck('descripcion','descripcion');
        $provedores=ProductoProvedores::pluck('razonsocial','id');
        $dolar = ProductoDolar::orderBy('id','DESC')->first();

        return view('productos::admin.producto.producto.duplicar',compact('categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto','dolar'));
    }










/*=========MODAL OFERTA========*/
    public function ProductoOfertaAdd(Request $request)
    {


    //si off , eliminamos la oferta
      if ($request['status-oferta'] != 'on') {
        $producto = Producto::where('uuid','=',$request['uuid'])->first();
        if ($producto->oferta != null) {
           $producto->oferta->delete();
        }
        $producto->producto_oferta_id = null;
        $producto->save();
        Alert::success('Mensaje existoso', 'Producto Modificado');
        return Redirect::back();
      }

      $rules = [
        'fecha_inicio' =>'required|date_format:d/m/Y H:i:s',
            'fecha_fin' => 'required|date_format:d/m/Y H:i:s|after:fecha_inicio',
            'descuento' =>'required',
    ];

    $customMessages = [
        'fecha_inicio.required' => 'No selecciono ninguna Fecha.',
            'fecha_fin.required' => 'No selecciono ninguna Fecha.',
            'fecha_fin.after' => 'La fecha FIN no puede ser menor que la fecha INICIO.',
            'descuento.required' => 'No selecciono ningun descuento.',
    ];

    $this->validate($request, $rules, $customMessages);



      $producto = Producto::where('uuid','=',$request['uuid'])->first();

      $oferta = new ProductoOferta;
      $fecha_inicio = Carbon::createFromFormat('d/m/Y H:i:s',$request['fecha_inicio']);
      $fecha_fin = Carbon::createFromFormat('d/m/Y H:i:s',$request['fecha_fin']);
      $oferta->fecha_inicio = $fecha_inicio;
      $oferta->fecha_fin = $fecha_fin;
      $oferta->descuento = $request['descuento'];
      $oferta->producto_id = $producto->id;
      $oferta->save();

      $producto->producto_oferta_id = $oferta->id;
      $producto->save();

      Alert::success('Mensaje existoso', 'Producto Modificado');
      return Redirect::back();
    }



    public function OfertaDetalles(Request $request,Producto $producto)
    {
      $producto = Producto::where('uuid','=',$producto->uuid)->with('oferta')->first();
      if ($producto->oferta != null) {
        $fecha_inicio = $producto->oferta->fecha_inicio->format('d/m/Y H:i:s');
        $fecha_fin = $producto->oferta->fecha_fin->format('d/m/Y H:i:s');
        return Response([$producto,$fecha_inicio,$fecha_fin]);
      }else{
        return Response([$producto]);
      }

    }
/*=========MODAL OFERTA========*/










/*=========MODAL EDITAR PRECIOS========*/

        public function EditarPrecios(Request $request)
    {

        $producto = Producto::where('uuid','=',$request['uuid'])->first();

        /*----PRECIOS----*/
      $producto->precio_costo_dolar_s_iva = $request['precio_costo_dolar_s_iva'];
      $producto->precio_costo_dolar_c_iva = $request['precio_costo_dolar_c_iva'];
      $producto->precio_venta_dolar_s_iva = $request['precio_venta_dolar_s_iva'];
      $producto->precio_venta_dolar_c_iva = $request['precio_venta_dolar_c_iva'];
      $producto->precio_tachado_dolar = $request['precio_tachado_dolar'];

      $producto->precio_costo_pesos_s_iva = $request['precio_costo_pesos_s_iva'];
      $producto->precio_costo_pesos_c_iva = $request['precio_costo_pesos_c_iva'];
      $producto->precio_venta_pesos_s_iva = $request['precio_venta_pesos_s_iva'];
      $producto->precio_venta_pesos_c_iva = $request['precio_venta_pesos_c_iva'];
      $producto->precio_tachado_pesos = $request['precio_tachado_pesos'];

      $producto->rentabilidad = $request['rentabilidad'];
      $producto->iva = $request['iva'];
      /*----PRECIOS----*/

      //$producto->puntos =$request['puntos'];

      $producto->stockactual =$request['stockactual'];
      $producto->stockcritico =$request['stockcritico'];
      $producto->stockpedido =$request['stockpedido'];
      $producto->save();

      //actualizamos el precio de los combos
      $this->ActualizarPrecioDelCombo();

      Alert::success('Mensaje existoso', 'Producto Modificado');
      return Redirect::back();

    }


     public function EditarPreciosAjax(Request $request,Producto $producto)
    {
      return Response([$producto]);
    }
/*=========MODAL EDITAR PRECIOS========*/




/*=========MODAL EDITAR STATUS========*/
    public function EditarStatus(Request $request)
    {

      $producto = Producto::where('uuid','=',$request['uuid'])->first();
      /*----STATUS----*/
      $producto->habilitado = $request['habilitado'];
      $producto->habilitado_add_cart = $request['habilitado_add_cart'];
      $producto->save();
      /*----STATUS----*/
      Alert::success('Mensaje existoso', 'Producto Modificado');
      return Redirect::back();
    }



    public function EditarStatusAjax(Request $request,Producto $producto)
    {
      return Response([$producto]);
    }
/*=========MODAL EDITAR STATUS========*/





    public function ReturnSubCategorias(Request $request,$id)
    {
        $subcategorias = ProductoCategoriaSub::where('producto_categoria_id','=', $id)->get();
        return Response($subcategorias);
    }

//----------------------------SECCION DEL PRODUCTOS------------------------------//



}
