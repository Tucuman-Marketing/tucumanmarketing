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
use Modules\Productos\Entities\Producto;

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
use Input;
use Hash;
use View;


class ProductoCategoriasController extends AdminBaseController
{

    public function __construct()
    {
        //para que funcione el constructor de AdminBaseController
        parent::__construct();
    }



    public function index()
    {


      $subcategorias = ProductoCategoriaSub::all();
       $categorias = ProductoCategoria::all();
        $categoriasList=ProductoCategoria::pluck('nombre','id');

         return view('productos::admin.categoria.index',compact('categorias','subcategorias','categoriasList'));

    }





    public function store(Request $request)
    {

        if (!empty($request->file('icon'))) {
            $imagen = $request->file('icon');
            $filename_icon = time() . '.' . $imagen->getClientOriginalExtension();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            // image::make($imagen->getRealPath())->save('storage/categorias/'. $filename_icon);
            $imagen->move(public_path().'/storage/categorias/', $filename_icon);
            $ruta_icon = 'storage/categorias/'.$filename_icon;
        }else{
            $filename_icon = "sin-icono.svg";
            $ruta_icon = "storage/categorias/sin-icono.svg";
        }

         if(!empty($request->hasFile('banner'))){
           $imagen = $request->file('banner');
            $filename_banner=time() . '.' . $imagen->getClientOriginalExtension();
            image::make($imagen->getRealPath())->save('storage/categorias/banner/'. $filename_banner);
             $ruta_banner = 'storage/categorias/banner/'.$filename_banner;

        }elseif(empty($request->hasFile('banner'))){
            $filename_banner = "sin-imagen.jpg";
            $ruta_banner = "theme-admin/velvet/assets/images/sin-imagen.jpg";
        }


        $categoria = new ProductoCategoria;
        $categoria->nombre = $request['nombre'];
        $categoria->slug = str_slug($request['nombre']);
        $categoria->banner = $ruta_banner;
        $categoria->banner_filename = $filename_banner;
        $categoria->icon = $ruta_icon;
        $categoria->icon_filename = $filename_icon;
        $categoria->save();


        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Categoria Creada');
       return Redirect::back();
    }






    public function update(Request $request, $id)
    {
        $categoria=ProductoCategoria::find($id);

       if ($request->hasFile('icon')) {
            $imagen = $request->file('icon');
            $filename_icon=time() . '.' . $imagen->getClientOriginalExtension();
            //eliminamos la imagen anterior - HOSTING
            if ($categoria->icon_filename != "sin-icono.svg") {
              \File::delete(public_path().'/'.$categoria->icon);
            }
            $imagen->move(public_path().'/storage/categorias/', $filename_icon);
            //image::make($imagen->getRealPath())->save('storage/categorias/'. $filename_icon);
            $ruta_icon = 'storage/categorias/'.$filename_icon;

            $categoria=ProductoCategoria::find($id);
            $categoria->icon = $ruta_icon;
            $categoria->icon_filename = $filename_icon;
            $categoria->save();
        }



         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('banner')) {
            $imagen =$request->file('banner');
            $filename_banner =time() . '.' . $imagen->getClientOriginalExtension();
            //eliminamos la imagen anterior - HOSTING
            if ($categoria->banner_filename != "sin-imagen.jpg") {
              \File::delete(public_path().'/'.$categoria->banner);
            }
          image::make($imagen->getRealPath())->resize(397, 395)->save('storage/categorias/banner/' . $filename_banner);
          $ruta_banner = 'storage/categorias/banner/'.$filename_banner;


            $categoria=ProductoCategoria::find($id);
            $categoria->banner = $ruta_banner;
            $categoria->banner_filename = $filename_banner;
            $categoria->save();
        }

        $categoria->nombre = $request['nombre'];
        $categoria->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Categoria Modificada');
       return Redirect::back();
    }





    public function destroy($id)
    {


        //si hay algun producto usando la categoria que no me deje eliminar
        $producto = Producto::where('producto_categoria_id','=',$id)->first();
        if (!empty($producto)) {
            flash('error al eliminar - hay productos que estan relacionados a esta Categoria')->error();
            return Redirect::back();
        }


        //eliminamos todas las sub categorias
        $subcategorias = ProductoCategoriaSub::where('producto_categoria_id','=',$id)->get();

         foreach ($subcategorias as $subcategoria) {
            $subcategoria->delete();
         }

        $categoria=ProductoCategoria::find($id);

        //eliminamos las imagenes y los iconos
        if ($categoria->banner_filename != "sin-imagen.jpg") {
              \File::delete(public_path().'/'.$categoria->banner);
            }

        if ($categoria->icon_filename != "sin-icono.svg") {
              \File::delete(public_path().'/'.$categoria->icon);
            }

        $categoria->delete();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Categoria y Sub Cateogiras Eliminada');
        return Redirect::back();
    }


}
