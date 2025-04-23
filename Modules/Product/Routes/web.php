<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Product\Http\Controllers\Admin\ProductoListarController;
use Modules\Product\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'product',], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('product.index')->middleware('permission:product-access');
        Route::get('/list', [ProductsController::class, 'indexDatatable'])->name('product.indexDatatable')->middleware('permission:product-access');
        Route::get('/create', [ProductsController::class, 'create'])->name('product.create')->middleware('permission:product-create');
        Route::get('/show/{product}', [ProductsController::class, 'show'])->name('product.show')->middleware('permission:product-view');
        Route::get('/edit/{product}', [ProductsController::class, 'edit'])->name('product.edit')->middleware('permission:product-edit');
        Route::post('/store', [ProductsController::class, 'store'])->name('product.store')->middleware('permission:product-create');
        Route::put('/update', [ProductsController::class, 'update'])->name('product.update')->middleware('permission:product-edit');
        Route::delete('/destroy', [ProductsController::class, 'destroy'])->name('product.destroy')->middleware('permission:product-delete');
        Route::delete('/massDestroy', [ProductsController::class, 'massDestroy'])->name('product.massDestroy')->middleware('permission:product-delete');
    });

});

//pestañas PRODUCTOS
Route::get('producto-scraping-dolar','ProductoScrapingDolarController@PrecioDelDolar');
Route::get('producto-scraping-dolar-all','ProductoScrapingDolarController@ModificarTodosLosPrecios');


/*------------------------------------Listar Pestañas--------------------------------------------*/


//pestañas PRODUCTOS
Route::get('panel', [ProductoListarController::class, 'index']);



Route::get('all-datatable','ProductoListarController@indexDatatable');

//Productos filtros
Route::get('productos-filtros/{producto}/{categoria}/{subcategoria}/{marca}','ProductoListarController@ProductoFiltrar');


// //pestañas STOCK
// Route::get('stock','ProductoListarController@ProductoEnStock')
// ->name('producto.stock')
// ->middleware('permission:producto-listar');

// Route::get('stock-datatable','ProductoListarController@ProductoEnStockDatatable');

// //pestañas STOCK CRITICO
// Route::get('stock-critico','ProductoListarController@StockCritico')
// ->name('producto.stock.critico')
// ->middleware('permission:producto-listar');

// Route::get('stockcritico-datatable','ProductoListarController@StockCriticoDatatable');

// //pestañas OFERTA
// Route::get('oferta','ProductoListarController@ProductosOferta')
// ->name('producto.oferta')
// ->middleware('permission:producto-listar');

// Route::get('oferta-datatable','ProductoListarController@ProductosOfertaDatatable');

// //pestañas DESABILITADO
// Route::get('desabilitado','ProductoListarController@ProductoDesabilitado')
// ->name('producto.desabilitado')
// ->middleware('permission:producto-listar');

// Route::get('desabilitado-datatable','ProductoListarController@ProductoDesabilitadoDatatable');



//pestañas REVIEW
Route::get('review','ProductoListarController@ProductoReview')
->name('producto.review');



/*------------------------------------Listar Pestañas--------------------------------------------*/




/*------------------------------------ABM PRODUCTO--------------------------------------------*/

//store producto
Route::get('create','ProductoController@create')
->name('producto.create')
->middleware('permission:producto-crear');
//crear producto
Route::post('store','ProductoController@store')
->name('producto.store');
//ver producto
Route::get('show/{producto}','ProductoController@show')
->name('producto.show')
->middleware('permission:producto-ver');
//editar producto
Route::get('edit/{producto}','ProductoController@edit')
->name('producto.edit')
->middleware('permission:producto-editar');
//update producto
Route::put('update/{producto}','ProductoController@update')
->name('producto.update');
//elimina producto
Route::delete('destroy','ProductoController@destroy')
->name('producto.destroy')
->middleware('permission:producto-eliminar');

//Duplicar producto
Route::get('duplicar-producto/{producto}','ProductoController@DuplicarProducto')
->name('producto.duplicar')
->middleware('permission:producto-crear');

//editar producto precios
Route::post('editar-precios','ProductoController@EditarPrecios')
->name('producto.editar.precios')
->middleware('permission:producto-editar');

Route::get('editar-precios-ajax/{producto}','ProductoController@EditarPreciosAjax')
->name('producto.editar.precios.ajax')
->middleware('permission:producto-editar');


//editar producto status
Route::post('editar-status','ProductoController@EditarStatus')
->name('producto.editar.status')
->middleware('permission:producto-editar');

Route::get('editar-status-ajax/{producto}','ProductoController@EditarStatusAjax')
->name('producto.editar.status.ajax')
->middleware('permission:producto-editar');


//Producto oferta
Route::post('producto-oferta-add','ProductoController@ProductoOfertaAdd')
->name('producto.oferta.add')
->middleware('permission:producto-crear');

//Producto oferta detalles (AJAX)
Route::get('producto-oferta-detalles/{producto}','ProductoController@OfertaDetalles')
->name('producto.oferta')
->middleware('permission:producto-crear');


//me devuelve las subcategorias al crear el prodcuto (select dinamico)
Route::get('ajax-subcategoria/{id}','ProductoController@ReturnSubCategorias');

/*---porducto carga de imaganes---*/
Route::get('producto-imagen/{producto}','ProductoImagenController@crear');
Route::match(['get','post'],'producto-upload-imagen/{producto}','ProductoImagenController@uploadFiles')
->name('producto.upload.imagen');
Route::get('producto-imagen-reload/{producto}','ProductoImagenController@Reload');
Route::get('producto-destroyimagen/{id}','ProductoImagenController@destroy');
/*---porducto carga de imaganes---*/

/*------------------------------------ABM PRODUCTO--------------------------------------------*/




/*-----------------------productos expeort and Import------------------------*/
Route::get('/productos-export','ProductoExportImportController@productosExport')->name('producto.excel.export');

Route::post('/productos-import','ProductoExportImportController@productosImport')->name('producto.excel.import');
/*-----------------------productos expeort and Import------------------------*/






//reviews
Route::get('review-{slug}','ProductoReviewController@Show')
->name('producto.review.show');

Route::DELETE('review-delete/{id}','ProductoReviewController@Delete')
->name('producto.review.delete');

Route::get('review-confirm/{id}','ProductoReviewController@Confirm')
->name('producto.review.confirm');

Route::get('review-spam/{id}','ProductoReviewController@Spam')
->name('producto.review.spam');







/*----------------------------------Producto Combo------------------------------------*/

//pestañas COMBO
Route::get('combos','ProductoComboController@ProductosCombo')
->name('producto.combo')
->middleware('permission:producto-listar');

Route::get('combo-datatable','ProductoComboController@ProductosComboDatatable');


//muestra los productos seleecionados para armar el combo (tabla)
Route::get('nuevo-combo-show','ProductoComboController@show')
->name('producto.combo.crear.show');
//seleccionar producto para armar el combo
Route::get('mostrar-producto-seleccionado/{id}','ProductoComboController@DatosDelProducto');
//agrega el combo a la tabla show
Route::get('nuevo-combo-add-item/{id}/{cantidad}/{descuento}','ProductoComboController@add')->name('producto.combo.add.item');
//actualizar los item agregados
Route::get('nuevo-combo-actualizar-item/{id}/{cantidad}','ProductoComboController@update')
->name('producto.combo.crear.update');
//descuento
Route::get('nuevo-combo-descuento-pesos/{descuentopesos}','ProductoComboController@DescuentoEnPesos')
->name('producto.combo.crear.descuento.pesos');
//eliminar item de la tabla
Route::get('nuevo-combo-delete-item/{id}','ProductoComboController@delete')
->name('producto.combo.crear.delete.item');
//limpiar combo
Route::get('nuevo-combo-vaciar','ProductoComboController@trash')
->name('producto.combo.crear.vaciar');



//calcular precio del combo
// Route::get('combo-calcular/{gabinete}/{mother}/{procesador}/{mouse}/{teclado}/{video}/{fuente}/{disco}/{memoria}','ProductoComboController@calcularCombo');

// Route::post('combo-calcular/{gabinete}/{mother}/{procesador}/{mouse}/{teclado}/{video}/{fuente}/{disco}/{memoria}','ProductoComboController@calcularCombo');

//calcular costo del combo
// Route::get('combo-calcular-costo/{gabinete}/{mother}/{procesador}/{mouse}/{teclado}/{video}/{fuente}/{disco}/{memoria}','ProductoComboController@calcularCostoCombo');

// Route::post('combo-calcular-costo/{gabinete}/{mother}/{procesador}/{mouse}/{teclado}/{video}/{fuente}/{disco}/{memoria}','ProductoComboController@calcularCostoCombo');

//create combo pc
Route::get('combo-create','ProductoComboController@ComboCreate')
->name('producto.combo.create');
//store combo pc
Route::post('combo-store','ProductoComboController@ComboStore')
->name('producto.combo.store');
//ver combo pc
Route::get('combo-show/{id}','ProductoComboController@ComboShow')
->name('producto.combo.show');
//editar combo pc
Route::get('combo-edit/{ProductoCombo}','ProductoComboController@ComboEdit')
->name('producto.combo.edit');
//update combo pc
Route::put('combo-update/{ProductoCombo}','ProductoComboController@ComboUpdate')
->name('producto.combo.update');
//elimina al combo
Route::delete('combo-delete/','ProductoComboController@ComboDestroy')
->name('producto.combo.destroy');
/*------------------------------------Producto Combo----------------------------------------*/





/*---------------------------Codigo de Barras-----------------------------------*/
Route::get('codigos-barras-filtrar','ProductoCodigoDeBarrasController@CodigoDeBarrasFiltrar')
->name('producto.codigo.barras');
Route::post('codigos-barras-generar','ProductoCodigoDeBarrasController@GenerarCodigoDeBarras')
->name('producto.codigo.barras.generar');
Route::post('codigos-barras-generar-seleccionados','ProductoCodigoDeBarrasController@GenerarCodigoDeBarrasSeleccionados')
->name('producto.codigo.barras.generar.seleccionados');
/*---------------------------Codigo de Barras-----------------------------------*/



/*------------------------------------Precios----------------------------------------*/
Route::get('producto-precios','ProductoPreciosController@Precios')
->name('producto.precios');

Route::post('producto-precios-modificar','ProductoPreciosController@PreciosModificar')
->name('producto.precios.editar')
->middleware('permission:producto-editar');

/*------------------------------------Precios----------------------------------------*/














Route::prefix('admin/marcas')->group(function() {
/*--------------------------------------MARCAS------------------------------------------------*/
Route::get('panel','ProductoMarcasController@index')->name('marcas');
Route::get('panel-datatable','ProductoMarcasController@indexDatatable');
Route::get('create','ProductoMarcasController@create')->name('marcas.create');
Route::post('store','ProductoMarcasController@store')->name('marcas.store');
Route::get('edit/{id}','ProductoMarcasController@edit')->name('marcas.edit');
Route::put('update','ProductoMarcasController@update')->name('marcas.update');
Route::delete('destroy','ProductoMarcasController@destroy')->name('marcas.destroy');
/*--------------------------------------MARCAS------------------------------------------------*/
});


Route::prefix('admin/rubros')->group(function() {
/*--------------------------------------RUBROS------------------------------------------------*/
Route::get('panel','ProductoRubrosController@index')->name('rubros');
Route::get('panel-datatable','ProductoRubrosController@indexDatatable');
Route::get('create','ProductoRubrosController@create')->name('rubros.create');
Route::post('store','ProductoRubrosController@store')->name('rubros.store');
Route::get('edit/{id}','ProductoRubrosController@edit')->name('rubros.edit');
Route::put('update','ProductoRubrosController@update')->name('rubros.update');
Route::delete('destroy','ProductoRubrosController@destroy')->name('rubros.destroy');
/*--------------------------------------RUBROS------------------------------------------------*/
});



Route::prefix('admin/proveedores')->group(function() {
/*--------------------------------------PROVEDORES------------------------------------------------*/
Route::get('panel','ProductoProvedoresController@index')->name('proveedores');
Route::get('panel-datatable','ProductoProvedoresController@indexDatatable');
Route::post('store','ProductoProvedoresController@store')->name('proveedores.store');
Route::get('edit/{id}','ProductoProvedoresController@edit')->name('proveedores.edit');
Route::put('update','ProductoProvedoresController@update')->name('proveedores.update');
Route::delete('destroy','ProductoProvedoresController@destroy')->name('proveedores.destroy');
/*--------------------------------------PROVEDORES------------------------------------------------*/
});


Route::prefix('admin/categorias')->group(function() {
/*--------------------------------CATEGORIA---------------------------------------*/
Route::get('panel','ProductoCategoriasController@index')->name('categorias');
Route::post('store','ProductoCategoriasController@store')->name('categorias.store');
Route::put('update/{id}','ProductoCategoriasController@update')->name('categorias.update');
Route::delete('destroy/{id}','ProductoCategoriasController@destroy')->name('categorias.destroy');
/*--------------------------------CATEGORIA--------------------------------------*/
});


Route::prefix('admin/subcategorias')->group(function() {
/*--------------------------------SUB CATEGORIAS---------------------------------------*/
Route::post('store','ProductoCategoriasSubController@store')->name('subcategorias.store');
Route::put('update/{id}','ProductoCategoriasSubController@update')->name('subcategorias.update');
Route::delete('destroy/{id}','ProductoCategoriasSubController@destroy')->name('subcategorias.destroy');
/*--------------------------------SUB CATEGORIAS--------------------------------------*/
});

