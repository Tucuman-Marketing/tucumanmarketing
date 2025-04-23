<?php

//namespace
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Notifications\notify;
use Illuminate\Notifications\DatabaseNotification;


//MODELS
use App\Models\User;

//LIBRERIAS
use Carbon\Carbon;
use Jenssegers\Date\Date;
use ImageIntervention;
use Storage;

// use Notification;
// use DataTables;
// use Debugbar;
// use Alert;
// use Session;
// use Redirect;
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

trait fileUpload
{

  public function __construct()
  {
  }



  static function fileUpload($request, $expenses,$type)
  {

    //carpeta
    $directory = "file/".$type;



    //pregunto si la imagen no es vacia y guado en $filename , caso contrario guardo null
    if (!empty($request->hasFile('file'))) {
      $file = $request->file('file');
      $filename = time() . '.' . $file->getClientOriginalName();
      //crea la carpeta - LOCAL

      //creamos la carpeta si no existe
      if (Storage::disk(env('DISK_FILE'))->exists($directory) != true) {
        Storage::disk(env('DISK_FILE'))->makeDirectory("file");
        Storage::disk(env('DISK_FILE'))->makeDirectory($directory);
      }

      //extension
      $extension = $file->getClientOriginalExtension();

      //guardamos el archivo con storage disk
      Storage::disk(env('DISK_FILE'))->putFileAs($directory, $file, $filename);

      $ruta = 'storage/' . $directory . '/' . $filename;

      //guardamos el thumbnails
     // ImageIntervention::make($file->getRealPath())->resize(150, 150)->save('storage/' . $directory . '/' . "thumbnail" . $filename);

      //$user = User::where('uuid','=',$user->uuid)->first();
      $expenses->file = $ruta;
      $expenses->filename = $filename;
      $expenses->extension = $extension;
      $expenses->save();

    }


  }





  static function fileUpdate($request, $expenses,$type)
  {
    //carpeta
    $directory = "file/".$type;

    //pregunto si la imagen no es vacia
    if (!empty($request->hasFile('file'))) {

      $file = $request->file('file');
      $filename = time() . '.' . $file->getClientOriginalName();


      //eliminamos el archivo anterior
      if (Storage::disk(env('DISK_FILE'))->exists($directory.'/'.$expenses->filename) == true) {
        //eliminamos los archvios
        Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$expenses->filename);
      }

      //guardamos el archivo con storage disk
      Storage::disk(env('DISK_FILE'))->putFileAs($directory, $file, $filename);

      $extension = $file->getClientOriginalExtension();
      $ruta = 'storage/' . $directory . '/' . $filename;

      $expenses->file = $ruta;
      $expenses->filename = $filename;
      $expenses->extension = $extension;
      $expenses->save();

    }
  }


  static function fileDelete($expenses,$type){

    $directory = "file/".$type;

    //eliminamos el archivo anterior - HOSTING
    if (!empty($expenses->filename)) {
      Storage::disk(env('DISK_FILE'))->delete($directory.'/'.$expenses->filename);
    }
  }



}
