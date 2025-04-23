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


class ProductoExportImportController extends AdminBaseController
{


     public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }


/*------------------------------EXPORT AND IMPORT--------------------*/
  public function productosExport(Request $request)
    {
        $export = Producto::all();

        Excel::create('Productos export',function($excel) use($export){
            $excel->sheet('productos',function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->export('xlsx');
         return Redirect::back();
    }

    public function productosImport(Request $request)
    {
        Excel::selectSheetsByIndex(0)->load(Input::file('file'),function($reader){

        //voy recorriendo las filas
        $reader->each(function($fila){

          //pregunto para que no se cargue una fila en blanco
         if ($fila->codigo != null and $fila->descripcion != null and $fila->stockactual != null) {

          $producto = new Producto;

          //para que no se repita el codigo de los productos
          if (Producto::where('codigo','=',$fila->codigo)->first() == null) {
            $producto->codigo = $fila->codigo;
          }else{
            flash('El codigo '.$fila->codigo.' ya se encuentra en uso')->error();
            return Redirect::back();
          }


          $producto->descripcion = $fila->descripcion;
          $producto->slug = Str::slug($fila->descripcion);

          $producto->preciocosto = $fila->preciocosto;
          $producto->precioventa = $fila->precioventa;
          $producto->precio2 = $fila->precio2;

          $producto->puntos = $fila->puntos;

          $producto->stockactual = $fila->stockactual;
          $producto->stockcritico = $fila->stockcritico;
          $producto->stockpedido = $fila->stockpedido;


          $producto->rubro_id = $fila->rubro_id;
          $producto->marca_id = $fila->marca_id;
          $producto->provedor_id = $fila->provedor_id;


        //ingreso de categoria
          if (Categoria::where('nombre','=',$fila->categoria_id)->first() != null) {
             $categoria = Categoria::where('nombre','=',$fila->categoria_id)->first();
             $producto->categoria_id = $categoria->id;
          }else{
            flash('Esta categoria " '.$fila->categoria_id.' " no existe , cree primero la categoria para guardar el producto')->error();
              return Redirect::back();
          }

        //Ingreso de sub-categoria
        if (Categoriasub::where('nombre','=',$fila->categoriasub_id)->first() != null) {
             $categoriaSub = Categoriasub::where('nombre','=',$fila->categoriasub_id)->first();

        if ($categoriaSub->categoria_id == $categoria->id) {
                $producto->categoriasub_id = $categoriaSub->id;
             }else{
            flash('Esta Sub-categoria no pertenece a la categoria '.$fila->categoria_id.' , Ingrese una Sub-categoria dentro de la Categoria '.$fila->categoria_id)->error();
            return Redirect::back();
             }

          }else{
         flash('no ingreso ninguna sub-categoria para el producto ' .$fila->descripcion)->error();
              return Redirect::back();
          }


          $producto->cod_alter = $fila->cod_alter;
          $producto->ubicacion = $fila->ubicacion;
          $producto->cod_bulto = $fila->cod_bulto;
          $producto->cant_bulto = $fila->cant_bulto;

          $producto->habilitado = 1;

          $producto->descripcioncorta = $fila->descripcioncorta;
          $producto->descripcionlarga = $fila->descripcionlarga;

          $producto->imagen1 = "storage/productos/sin-foto.jpg";
          $producto->filename = "sin-foto.jpg";

            $producto->save();

        }


        flash('Productos Cargados Exitosamente')->success();

        });
    });


        return Redirect::back();
    }
 /*------------------------------EXPORT AND IMPORT--------------------*/

}
