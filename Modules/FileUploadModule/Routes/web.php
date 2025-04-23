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

use Modules\FileUploadModule\Http\Controllers\FileUploadingController;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Filepond Carga en Temporal
    Route::post('/upload', [FileUploadingController::class, 'storeMedia'])->name('filepond.upload');
    // Filepond Elimina de la "X" de los Edit
    Route::delete('/delete', [FileUploadingController::class, 'deleteMedia'])->name('filepond.delete');
    // Filepond Elimina del componente
    Route::delete('/delete-component', [FileUploadingController::class, 'deleteMediaComponent'])->name('filepond.delete.component');

    //Store temporal y eliminado de imagenes en CKEditor
    Route::post('/ckmedia', [FileUploadingController::class, 'storeCKEditorImages'])->name('file.storeCKEditorImages');
    Route::post('ckeditor/delete-image', [FileUploadingController::class, 'deleteCKEditorImage'])->name('file.deleteCKEditorImage');
});


    // Filepond Carga en Temporal
    Route::post('/upload', [FileUploadingController::class, 'storeMedia'])->name('filepond.upload');
    // Filepond Elimina de la "X" de los Edit
    Route::delete('/delete', [FileUploadingController::class, 'deleteMedia'])->name('filepond.delete');
    // Filepond Elimina del componente
    Route::delete('/delete-component', [FileUploadingController::class, 'deleteMediaComponent'])->name('filepond.delete.component');

    //Store temporal y eliminado de imagenes en CKEditor
    Route::post('/ckmedia', [FileUploadingController::class, 'storeCKEditorImages'])->name('file.storeCKEditorImages');
    Route::post('ckeditor/delete-image', [FileUploadingController::class, 'deleteCKEditorImage'])->name('file.deleteCKEditorImage');
