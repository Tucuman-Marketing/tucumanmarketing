<?php

use Illuminate\Support\Facades\Route;

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

use Modules\ServiceModule\Http\Controllers\Admin\ServicesController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'services',], function () {
        Route::get('/', [ServicesController::class, 'index'])->name('services.index')->middleware('permission:service-access');
        Route::get('/list', [ServicesController::class, 'indexDatatable'])->name('services.indexDatatable')->middleware('permission:service-access');
        Route::get('/create', [ServicesController::class, 'create'])->name('services.create')->middleware('permission:service-create');
        Route::get('/show/{subscriptions}', [ServicesController::class, 'show'])->name('services.show')->middleware('permission:service-view');
        Route::get('/edit/{subscriptions}', [ServicesController::class, 'edit'])->name('services.edit')->middleware('permission:service-edit');
        Route::post('/store', [ServicesController::class, 'store'])->name('services.store')->middleware('permission:service-create');
        Route::put('/update', [ServicesController::class, 'update'])->name('services.update')->middleware('permission:service-edit');
        Route::delete('/destroy', [ServicesController::class, 'destroy'])->name('services.destroy')->middleware('permission:service-delete');
        Route::delete('/massDestroy', [ServicesController::class, 'massDestroy'])->name('services.massDestroy')->middleware('permission:service-delete');
    });

});