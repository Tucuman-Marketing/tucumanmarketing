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


class ProductoComboCronController extends AdminBaseController
{





    //===================CRON======================//
    static function ComboActualizarPrecio()
    {
    $ProductoCombos = Producto::where('producto_combo','=',1)->get();
    foreach ($ProductoCombos as $key => $ProductoCombo) {

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
        foreach ($ProductoCombo->combos as $key => $combo) {
            $cantidad = $combo->cantidad;
            $descuento = $combo->descuento;

            $precio_costo_dolar_s_iva += $combo->producto->precio_costo_dolar_s_iva*$cantidad;
            $precio_costo_dolar_c_iva += $combo->producto->precio_costo_dolar_c_iva*$cantidad;
            $precio_venta_dolar_s_iva += $combo->producto->precio_venta_dolar_s_iva*$cantidad;
            $precio_venta_dolar_c_iva += $combo->producto->precio_venta_dolar_c_iva*$cantidad;

            $precio_costo_pesos_s_iva += $combo->producto->precio_costo_pesos_s_iva*$cantidad;
            $precio_costo_pesos_c_iva += $combo->producto->precio_costo_pesos_c_iva*$cantidad;
            $precio_venta_pesos_s_iva += $combo->producto->precio_venta_pesos_s_iva*$cantidad;
            $precio_venta_pesos_c_iva += $combo->producto->precio_venta_pesos_c_iva*$cantidad;
        }

        //guardamos los datos
        $ProductoCombo->precio_costo_dolar_s_iva = $precio_costo_dolar_s_iva;
        $ProductoCombo->precio_costo_dolar_c_iva = $precio_costo_dolar_c_iva;
        $ProductoCombo->precio_venta_dolar_s_iva = $precio_venta_dolar_s_iva;
        $ProductoCombo->precio_venta_dolar_c_iva = $precio_venta_dolar_c_iva;
        $ProductoCombo->precio_tachado_dolar = $precio_venta_dolar_c_iva*1.15;

        $ProductoCombo->precio_costo_pesos_s_iva = $precio_costo_pesos_s_iva;
        $ProductoCombo->precio_costo_pesos_c_iva = $precio_costo_pesos_c_iva;
        $ProductoCombo->precio_venta_pesos_s_iva = $precio_venta_pesos_s_iva;
        $ProductoCombo->precio_venta_pesos_c_iva = $precio_venta_pesos_c_iva;
        $ProductoCombo->precio_tachado_pesos = $precio_venta_pesos_c_iva*1.15;
        $ProductoCombo->save();
        \Log::info("el combo ".$ProductoCombo->descripcion." fue actualizado");
        }
    }
    //===================CRON======================//


}
