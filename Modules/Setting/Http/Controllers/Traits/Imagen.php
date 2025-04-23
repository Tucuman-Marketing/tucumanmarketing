<?php

//namespace
namespace Modules\Setting\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Notifications\notify;
use Illuminate\Notifications\DatabaseNotification;


//modelos
use App\Models\User;
// use Modules\Productos\Entities\ProductoCategoria;
// use Modules\Productos\Entities\ProductoCategoriaSub;
// use Modules\Productos\Entities\ProductoCombos;
// use Modules\Productos\Entities\ProductoImagen;
// use Modules\Productos\Entities\ProductoIva;
// use Modules\Productos\Entities\ProductoMarcas;
// use Modules\Productos\Entities\Producto;
// use Modules\Productos\Entities\ProductoProductoTag;
// use Modules\Productos\Entities\ProductoProvedores;
// use Modules\Productos\Entities\ProductoReviews;
// use Modules\Productos\Entities\ProductoRubros;
// use Modules\Productos\Entities\ProductoTag;
// use Modules\Productos\Entities\ProductoDolar;
// use Modules\Productos\Entities\ProductoOferta;


use Carbon\Carbon;
use Jenssegers\Date\Date;
use ImageIntervention;

// use Notification;
// use DataTables;
// use Debugbar;
// use Alert;
// use Session;
// use Redirect;
use Storage;
// use DB;
// use Image;
// use Auth;
// use Flash;
// use Toastr;
// use Exception;
// use MP;
// use Hash;
// use View;
// use Hashids;
// use Excel;
// use NumerosEnLetras;



trait Imagen
{

  public function __construct()
  {
  }



  static function ImagenCreate($request, $carpeta,$file,$settingCompany)
  {
   
    //carpeta
    $directory = $carpeta;
    
    //pregunto si la imagen no es vacia y guado en $filename , caso contrario guardo null
    if (!empty($request->hasFile($file))) {
      $imagen = $request->file($file);
      $filename = time() . '.' . $imagen->getClientOriginalName();

       //creamos la carpeta si no existe
       if (Storage::disk(env('DISK_FILE'))->exists($directory) != true) {
        Storage::disk(env('DISK_FILE'))->makeDirectory($directory);
      } 
     
      //guardamos la imagen
      if($carpeta == "favicon"){
        Storage::disk(env('DISK_FILE'))->putFileAs($directory, $imagen, $filename);
      }else{
        ImageIntervention::make($imagen->getRealPath())->save('storage/' . $directory . '/' . $filename);
      }
      
    
      $ruta = 'storage/' . $directory . '/' . $filename;

      $rutaThumb = 'storage/' . $directory . '/' . "thumbnail" . $filename;
      $thumbsnail_filename = "thumbnail" . $filename;
    } else {
      //crea la carpeta - LOCAL
      if (Storage::disk(env('DISK_FILE'))->exists($directory) != true) {
        Storage::disk(env('DISK_FILE'))->makeDirectory($directory);
      } 

      $filename = "default-image.jpg";
      $ruta = "storage/default-image.jpg";

      $rutaThumb = "storage/default-image.jpg";
      $thumbsnail_filename = "default-image.jpg";
    }

    //$user = User::where('uuid','=',$user->uuid)->first();
    $file_imagen = $file . "_imagen";
    $file_filename = $file . "_filename";

    
    $settingCompany[$file_imagen] = $ruta;
    $settingCompany[$file_filename] = $filename;

    //$user->thumbsnail = $rutaThumb;
    //$user->thumbsnail_filename = $thumbsnail_filename;

    $settingCompany->save();

    // return $settingCompany;
  }





  static function ImagenUpdate($request, $carpeta,$file,$settingCompany)
  {
    //carpeta
    $directory = $carpeta;

    //pregunto si la imagen no es vacia
    if (!empty($request->hasFile($file))) {

      $imagen = $request->file($file);
      $filename = time() . '.' . $imagen->getClientOriginalName();

      //creamos la carpeta si no existe
      if (Storage::disk(env('DISK_FILE'))->exists($directory) != true) {
        Storage::disk(env('DISK_FILE'))->makeDirectory($directory);
      } 

      //eliminamos el archivo anterior
      if ($carpeta == "favicon") {
        Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$settingCompany->favicon_filename);
      }else{
        Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$settingCompany->logo_filename);
      }


      $file_imagen = $file . "_imagen";
      $file_filename = $file . "_filename";

      //guardamos el favicon o la imagen
      if($carpeta == "favicon"){
        Storage::disk(env('DISK_FILE'))->putFileAs($directory, $imagen, $filename);
      }else{
        ImageIntervention::make($imagen->getRealPath())->save('storage/' . $directory . '/' . $filename);
      }

      $ruta = 'storage/' . $directory . '/' . $filename;
      $rutaThumb = 'storage/' . $directory . '/' . "thumbnail" . $filename;


      // $settingCompany = User::where('uuid', '=', $user->uuid)->first();
      $settingCompany[$file_imagen] = $ruta;
      $settingCompany[$file_filename] = $filename;

     // $user->thumbsnail = $rutaThumb;
      //$user->thumbsnail_filename = "thumbnail" . $filename;

      $settingCompany->save();

      //return $user;
    }
  }



 
  static function ImagenDelete($settingCompany)
  {
    
    
   
    
    //eliminamos la imagen logo
    if (!empty($settingCompany->logo_imagen)) {
      $directory = "logo";
      Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$settingCompany->logo_filename);
    }

    //eliminamos la imagen favicon
    if (!empty($settingCompany->favicon_imagen)) {
      $directory = "favicon";
      Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$settingCompany->favicon_filename);
    }

  


  }


}
