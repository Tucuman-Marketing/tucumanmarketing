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
use Illuminate\Support\Facades\Route;
use Modules\CoreForm\Http\Controllers\Admin\CoreFormController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'core-forms'], function () {
        Route::get('/', [CoreFormController::class, 'index'])->name('coreforms.index');
        Route::get('/list', [CoreFormController::class, 'indexDatatable'])->name('coreforms.indexDatatable')->middleware('permission:coreform-access');
        Route::get('/create', [CoreFormController::class, 'create'])->name('coreforms.create')->middleware('permission:coreform-create');
        Route::get('/show/{coreform}', [CoreFormController::class, 'show'])->name('coreforms.show')->middleware('permission:coreform-view');
        Route::get('/edit/{coreform}', [CoreFormController::class, 'edit'])->name('coreforms.edit')->middleware('permission:coreform-edit');
        Route::post('/store', [CoreFormController::class, 'store'])->name('coreforms.store')->middleware('permission:coreform-create');
        Route::put('/update', [CoreFormController::class, 'update'])->name('coreforms.update')->middleware('permission:coreform-edit');
        Route::delete('/destroy', [CoreFormController::class, 'destroy'])->name('coreforms.destroy')->middleware('permission:coreform-delete');
        Route::delete('/massDestroy', [CoreFormController::class, 'massDestroy'])->name('coreforms.massDestroy')->middleware('permission:coreform-delete');
    });
});


