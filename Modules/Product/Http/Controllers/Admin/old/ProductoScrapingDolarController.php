<?php
namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;

use Illuminate\Support\Facades\Input;

//Request
use Modules\Productos\Http\Requests\ProductoCreateRequest;
use Modules\Productos\Http\Requests\ProductoUpdateRequest;

//model
use Modules\Productos\Entities\Producto;
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


class ProductoScrapingDolarController extends Controller
{



    static function PrecioDelDolar()
    {


        $client = new Client();
        $crawler = $client->request("GET","http://www.bna.com.ar");
       $crawler->filter('.table > tbody')->filter('tr')->first()->each(function ($node) {
            $dolar = $node->children()->filter('td')->eq(2)->text();

            dd($dolar);
            //si se guardo el valor del dolar que cambie los precios
            if (isset($dolar)) {

                 $dolar = (float)( 0+ str_replace(',','.',$dolar));
                 $nuevoDolar = new ProductoDolar;
                 $nuevoDolar->banco = "Banco Nacion";
                 $nuevoDolar->dolar = $dolar+1.5;
                 $nuevoDolar->save();

            }//end if
        });


       \Log::info("Dolar Actualizado");
    }




    static function ModificarTodosLosPrecios()
    {



        $dolarPenultimo = DB::table('producto_dolars')->orderBy('id','DESC')->skip(1)->limit(1)->first();
        $dolarUltimo = DB::table('producto_dolars')->orderBy('id','DESC')->first();

       dump($dolarUltimo->dolar);

        //si subio el dolar que modifique los precios
        if ($dolarUltimo->dolar > $dolarPenultimo->dolar ) {
            $productos = Producto::all();
            foreach ($productos as $key => $producto) {

//que me actualize todos menos red dragon
// if ($producto->marca->descripcion != "Redragon") {

$producto->precio_costo_pesos_s_iva = $producto->precio_costo_dolar_s_iva*$dolarUltimo->dolar;

$producto->precio_costo_pesos_c_iva = $producto->precio_costo_dolar_c_iva*$dolarUltimo->dolar;

$producto->precio_venta_pesos_s_iva = $producto->precio_venta_dolar_s_iva * $dolarUltimo->dolar;

$producto->precio_venta_pesos_c_iva = $producto->precio_venta_dolar_c_iva * $dolarUltimo->dolar;

$producto->precio_tachado_pesos = $producto->precio_tachado_dolar*$dolarUltimo->dolar;

$producto->save();


\Log::info("El Producto :".$producto->descripcion." se actualizo correctamente");

                // }
            }
            \Log::info("El dolar subio , Todos los precios de los productos fueron modificados");
        }//endif


        //si baja el dolar hasta 0.5 su valor , que bajen los precios
        $diferencia = $dolarPenultimo->dolar - $dolarUltimo->dolar;
       // $dolarUltimo->dolar < $dolarPenultimo->dolar and $diferencia <= 0.5
        if ($dolarUltimo->dolar < $dolarPenultimo->dolar and $diferencia <= 3) {
            $productos = Producto::all();
            foreach ($productos as $key => $producto) {


// que me actualize todos menos red dragon
// if ($producto->marca->descripcion != "Redragon") {


$producto->precio_costo_pesos_s_iva = $producto->precio_costo_dolar_s_iva*$dolarUltimo->dolar;

$producto->precio_costo_pesos_c_iva = $producto->precio_costo_dolar_c_iva*$dolarUltimo->dolar;

$producto->precio_venta_pesos_s_iva = $producto->precio_venta_dolar_s_iva * $dolarUltimo->dolar;

$producto->precio_venta_pesos_c_iva = $producto->precio_venta_dolar_c_iva * $dolarUltimo->dolar;

$producto->precio_tachado_pesos = $producto->precio_tachado_dolar * $dolarUltimo->dolar;

$producto->save();

\Log::info("El Producto :".$producto->descripcion." se actualizo correctamente");
                // }

            }
            \Log::info("El dolar bajo ,Todos los precios de los productos fueron modificados");
        }//endif




    //========================ACTUALIZAMOS LOS COMBOS=================//
    $ProductoCombos = producto::where('producto_combo','=',1)->get();
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

            $precio_costo_dolar_s_iva += $combo->producto->precio_costo_dolar_s_iva;
            $precio_costo_dolar_c_iva += $combo->producto->precio_costo_dolar_c_iva;
            $precio_venta_dolar_s_iva += $combo->producto->precio_venta_dolar_s_iva;
            $precio_venta_dolar_c_iva += $combo->producto->precio_venta_dolar_c_iva;
            $precio_costo_pesos_s_iva += $combo->producto->precio_costo_pesos_s_iva;
            $precio_costo_pesos_c_iva += $combo->producto->precio_costo_pesos_c_iva;
            $precio_venta_pesos_s_iva += $combo->producto->precio_venta_pesos_s_iva;
            $precio_venta_pesos_c_iva += $combo->producto->precio_venta_pesos_c_iva;
        }

        //guardamos los datos
        $ProductoCombo->precio_costo_dolar_s_iva = $precio_costo_dolar_s_iva;
        $ProductoCombo->precio_costo_dolar_c_iva = $precio_costo_dolar_c_iva;
        $ProductoCombo->precio_venta_dolar_s_iva = $precio_venta_dolar_s_iva;
        $ProductoCombo->precio_venta_dolar_c_iva = $precio_venta_dolar_c_iva;
        $ProductoCombo->precio_costo_pesos_s_iva = $precio_costo_pesos_s_iva;
        $ProductoCombo->precio_costo_pesos_c_iva = $precio_costo_pesos_c_iva;
        $ProductoCombo->precio_venta_pesos_s_iva = $precio_venta_pesos_s_iva;
        $ProductoCombo->precio_venta_pesos_c_iva = $precio_venta_pesos_c_iva;
        $ProductoCombo->save();


        \Log::info("el combo ".$ProductoCombo->descripcion." fue actualizado");
        }
    //========================ACTUALIZAMOS LOS COMBOS=================//
    }








}







