<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


//controller AdminBase
use App\Http\Controllers\AdminBaseController;

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


class ProductoReviewController extends AdminBaseController
{

  public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }





     public function Reviews(Request $request,$slug)
    {


   $producto = Producto::where('slug','=', $slug)->firstOrFail();
   $user = Auth::user()->id;

    $input = array(
    'comment' => $request->get('comment'),
    'rating'  => $request->get('rating')
  );

  // instantiate Rating model
  $review = Review::create([
      'producto_id'=>$producto->id,
      'user_id'=>$user,
      'rating'=>$input['rating'],
      'comment'=>$input['comment'],
      'approved'=>1,
      'spam'=>0,
    ]);


  $review->storeReviewForProduct($slug, $input['comment'], $input['rating']);

     return Redirect::back()->with('review_posted',true);
  //return Redirect::to('products/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
    }





    public function Show($slug){

        $producto = Producto::where('slug','=', $slug)->firstOrFail();
        $reviews = ProductoReviews::where('producto_id','=',$producto->id)->orderBy('created_at','desc')->get();
          $link= "review";

        return view('productos::admin.producto.review.review',compact('link','reviews'));
    }


    public function Delete($id){
        $Review = ProductoReviews::find($id);
        $Review->delete();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Review Eliminado');
        return Redirect::back();
    }


    public function Confirm($id){
        $Review = ProductoReviews::find($id);
        $Review->approved = 1;
        $Review->save();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Review Aprobado');
        return Redirect::back();
    }


    public function Spam($id){
        $Review = ProductoReviews::find($id);
        $Review->approved = 0;
        $Review->save();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Review Spam');
        return Redirect::back();
    }


}
