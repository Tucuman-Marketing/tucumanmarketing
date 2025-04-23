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

use Modules\PosModule\Http\Controllers\Admin\AdminPosController;
use Modules\PosModule\Http\Controllers\Client\ClientPosController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'washeds',], function () {
        Route::get('/', [AdminPosController::class, 'index'])->name('washeds.index')->middleware('permission:washeds-access');
        Route::get('/list', [AdminPosController::class, 'indexDatatable'])->name('washeds.indexDatatable')->middleware('permission:washeds-access');
        Route::get('/list-search', [AdminPosController::class, 'searchDatatable'])->name('washeds.searchDatatable')->middleware('permission:washeds-access');
        Route::get('/create', [AdminPosController::class, 'create'])->name('washeds.create')->middleware('permission:washeds-create');
        Route::get('/show/{washeds}', [AdminPosController::class, 'show'])->name('washeds.show')->middleware('permission:washeds-view');
        Route::get('/edit/{washeds}', [AdminPosController::class, 'edit'])->name('washeds.edit')->middleware('permission:washeds-edit');
        Route::post('/store', [AdminPosController::class, 'store'])->name('washeds.store')->middleware('permission:washeds-create');
        Route::put('/update', [AdminPosController::class, 'update'])->name('washeds.update')->middleware('permission:washeds-edit');
        Route::delete('/destroy', [AdminPosController::class, 'destroy'])->name('washeds.destroy')->middleware('permission:washeds-delete');
        Route::delete('/massDestroy', [AdminPosController::class, 'massDestroy'])->name('washeds.massDestroy')->middleware('permission:washeds-delete');
    });
});

Route::group(['prefix' => 'client', 'as' => 'client.', 'namespace' => 'client', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'washeds',], function () {
        Route::get('/', [ClientPosController::class, 'index'])->name('washeds.index');
        Route::get('/list', [ClientPosController::class, 'indexDatatable'])->name('washeds.indexDatatable');
        Route::get('/list-search', [ClientPosController::class, 'searchDatatable'])->name('washeds.searchDatatable');
        Route::get('/show/{washeds}', [ClientPosController::class, 'show'])->name('washeds.show');
    });
});


