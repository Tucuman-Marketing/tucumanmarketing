<?php

namespace App\Traits;

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



  static function ImagenCreate($request, $model)
  {
    //carpeta
    $directory = "users/" . $model->uuid;

    //pregunto si la imagen no es vacia y guado en $filename , caso contrario guardo null
    if (!empty($request->hasFile('image'))) {
      $imagen = $request->file('image');
      $filename = time() . '.' . $imagen->getClientOriginalName();
      if (env('DISK_FILE') === 'local') {
            // crea la carpeta - LOCAL
            Storage::makeDirectory($directory);
        } else {
            // crea la carpeta - HOSTING
            \File::makeDirectory(public_path() . '/storage/' . $directory, 0775, true);
      }
      //guardamos la imagen
      //image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
      ImageIntervention::make($imagen->getRealPath())->save('storage/' . $directory . '/' . $filename);

      $ruta = 'storage/' . $directory . '/' . $filename;

      //guardamos el thumbnails
      ImageIntervention::make($imagen->getRealPath())->resize(150, 150)->save('storage/' . $directory . '/' . "thumbnail" . $filename);

      $rutaThumb = 'storage/' . $directory . '/' . "thumbnail" . $filename;
      $thumbsnail_filename = "thumbnail" . $filename;
    } else {
      //crea la carpeta - LOCAL
      // Storage::makeDirectory($directory);
      //crea la carpeta - HOSTING
      \File::makeDirectory(public_path() . '/storage/' . $directory);
      $filename = "avatar-default.svg";
      $ruta = "storage/users/avatar-default.svg";

      $rutaThumb = "storage/users/avatar-default.svg";
      $thumbsnail_filename = "avatar-default.svg";
    }

    //$model = User::where('uuid','=',$model->uuid)->first();
    $model->image = $ruta;
    $model->image_filename = $filename;

    $model->thumbsnail = $rutaThumb;
    $model->thumbsnail_filename = $thumbsnail_filename;

    $model->save();

    return $model;
  }





  static function ImagenUpdate($request, $user)
  {
    //carpeta
    $directory = "users/" . $user->uuid;

    //pregunto si la imagen no es vacia
    if (!empty($request->hasFile('image'))) {

      $imagen = $request->file('image');
      $filename = time() . '.' . $imagen->getClientOriginalName();

      //eliminamos la imagen anterior - HOSTING
      if (Storage::disk(env('DISK_FILE'))->exists($directory.'/'.$user->image_filename) == true) {
        //eliminamos la imagencon Storage disk
        Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$user->image_filename);
        Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$user->thumbsnail_filename);
      }

      //preguntamos si existe la carpeta
      if (Storage::disk(env('DISK_FILE'))->exists($directory)) {
      } else {
          // El directorio no existe
          Storage::disk(env('DISK_FILE'))->makeDirectory($directory);
      }


      //guardamos la imagen nueva
      ImageIntervention::make($imagen->getRealPath())->save('storage/' . $directory . '/' . $filename);

      $ruta = 'storage/' . $directory . '/' . $filename;

      //guardamos el thumbsnails
      ImageIntervention::make($imagen->getRealPath())->resize(150, 150)->save('storage/' . $directory . '/' . "thumbnail" . $filename);

      $rutaThumb = 'storage/' . $directory . '/' . "thumbnail" . $filename;


      $user = User::where('uuid', '=', $user->uuid)->first();
      $user->image = $ruta;
      $user->image_filename = $filename;

      $user->thumbsnail = $rutaThumb;
      $user->thumbsnail_filename = "thumbnail" . $filename;

      $user->save();

      return $user;
    }
  }


  static function ImagenDelete($request, $user){

      //carpeta
      $directory = "users/" . $user->uuid;

      //eliminamos la imagen anterior - HOSTING
      //preguntamos si existe la imagen
      if (\File::exists(public_path() . '/' . $user->image)) {
        \File::delete(public_path() . '/' . $user->image);
        \File::delete(public_path() . '/' . $user->thumbsnail);

        //eliminamos de la db la imagen y el filename
        $user->image = null;
        $user->image_filename = null;
        $user->thumbsnail = null;
        $user->thumbsnail_filename = null;
        $user->save();
      }


  }



}
