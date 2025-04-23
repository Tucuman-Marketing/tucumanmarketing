<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Controller;


//controller AdminBase
use App\Http\Controllers\AdminBaseController;

//model
use Modules\Productos\Entities\ProductoImagen;
use Modules\Productos\Entities\Producto;
use Modules\Productos\Entities\ProductoCategoria;
use Modules\Productos\Entities\ProductoCategoriaSub;





use Notification;
use DataTables;
use Debugbar;
use Alert;
use Session;
use Redirect;
use Validator;
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
use Response;

class ProductoImagenController extends AdminBaseController
{


    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }



    public function crear(Producto $producto)
    {
        $imagens= ProductoImagen::where('producto_id', '=',$producto->id)->get();
        $link = "productos";
        return view('productos::admin.producto.producto-imagen.imagen',compact('link','producto','imagens'));
    }


   public function uploadFiles(Request $request,Producto $producto) {

    $directory = "productos/".$producto->uuid;
    $files = $request->file('file');

    foreach($files as $file){
        //lo guarda con el  nombre generado
        $filename=time() . '.' . $file->getClientOriginalName();

        image::make($file->getRealPath())->save( 'storage/'.$directory.'/'. $filename);

        $imagen = new ProductoImagen;
        $imagen->nombre = $filename;
        $imagen->ruta = 'storage/'.$directory.'/'. $filename;
        $imagen->producto_id = $producto->id;
        $imagen->save();
    }

       return response()->json(['uploaded' => '/uploadedImages/']);

    }


   public function reload(Producto $producto)
    {
        $imagens= ProductoImagen::where('producto_id', '=',$producto->id)->get();
        return response([$imagens]);
    }



    public function destroy($id)
    {
        $imagen=ProductoImagen::find($id);
        \Storage::disk('raiz')->delete($imagen->ruta);
        $imagen->delete();
        Alert::success('Mensaje existoso', 'Imagen Eliminada');
        return Redirect::back();
    }





}
