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

//use MercadoPagoController
use Modules\PaymentMethodsModule\Http\Controllers\Admin\MercadoPago\MercadoPagoController;


// Route::get('mp-test/', [MercadoPagoController::class, 'test'])->name('mp.test');
// Route::get('/', [MercadoPagoController::class, 'preference'])->name('mp.preference');
// Route::get('/', [MercadoPagoController::class, 'PymentData'])->name('mp.pymentdata');


Route::get('/payment/success', [MercadoPagoController::class, 'success'])->name('mp.success');
Route::get('/payment/failure', [MercadoPagoController::class, 'failure'])->name('mp.failure');
Route::get('/payment/pending', [MercadoPagoController::class, 'pending'])->name('mp.pending');
