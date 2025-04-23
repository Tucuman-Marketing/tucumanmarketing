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
use Modules\SubscriptionsModule\Http\Controllers\Admin\AdminSubscriptionsController;
use Modules\SubscriptionsModule\Http\Controllers\Admin\AdminSubscriptionPaysController;
use Modules\SubscriptionsModule\Http\Controllers\Admin\AdminSubscriptionPlansController;
use Modules\SubscriptionsModule\Http\Controllers\Client\ClientSubscriptionsController;
use Modules\SubscriptionsModule\Http\Controllers\Client\ClientSubscriptionPaysController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::group(['prefix' => 'subscriptions',], function () {
        Route::get('/', [AdminSubscriptionsController::class, 'index'])->name('subscriptions.index')->middleware('permission:subscriptions-access');
        Route::get('/list', [AdminSubscriptionsController::class, 'indexDatatable'])->name('subscriptions.indexDatatable')->middleware('permission:subscriptions-access');
        Route::get('/create', [AdminSubscriptionsController::class, 'create'])->name('subscriptions.create')->middleware('permission:subscriptions-create');
        Route::get('/show/{subscriptions}', [AdminSubscriptionsController::class, 'show'])->name('subscriptions.show')->middleware('permission:subscriptions-view');
        Route::get('/edit/{subscriptions}', [AdminSubscriptionsController::class, 'edit'])->name('subscriptions.edit')->middleware('permission:subscriptions-edit');
        Route::post('/store', [AdminSubscriptionsController::class, 'store'])->name('subscriptions.store')->middleware('permission:subscriptions-create');
        Route::put('/update', [AdminSubscriptionsController::class, 'update'])->name('subscriptions.update')->middleware('permission:subscriptions-edit');
        Route::delete('/destroy', [AdminSubscriptionsController::class, 'destroy'])->name('subscriptions.destroy')->middleware('permission:subscriptions-delete');
        Route::delete('/massDestroy', [AdminSubscriptionsController::class, 'massDestroy'])->name('subscriptions.massDestroy')->middleware('permission:subscriptions-delete');

        Route::get('/getUserCars/{id}', [AdminSubscriptionsController::class, 'getUserCars'])->name('subscriptions.getUserCars');
        Route::get('/getPlans/{id}', [AdminSubscriptionsController::class, 'getPlans'])->name('subscriptions.getPlans');
    });


    Route::group(['prefix' => 'subscriptions-plans',], function () {
        Route::get('/', [AdminSubscriptionPlansController::class, 'index'])->name('plans.index')->middleware('permission:plans-access');
        Route::get('/list', [AdminSubscriptionPlansController::class, 'indexDatatable'])->name('plans.indexDatatable')->middleware('permission:plans-access');
        Route::get('/create', [AdminSubscriptionPlansController::class, 'create'])->name('plans.create')->middleware('permission:plans-create');
        Route::get('/show/{plans}', [AdminSubscriptionPlansController::class, 'show'])->name('plans.show')->middleware('permission:plans-view');
        Route::get('/edit/{plans}', [AdminSubscriptionPlansController::class, 'edit'])->name('plans.edit')->middleware('permission:plans-edit');
        Route::post('/store', [AdminSubscriptionPlansController::class, 'store'])->name('plans.store')->middleware('permission:plans-create');
        Route::put('/update', [AdminSubscriptionPlansController::class, 'update'])->name('plans.update')->middleware('permission:plans-edit');
        Route::delete('/destroy', [AdminSubscriptionPlansController::class, 'destroy'])->name('plans.destroy')->middleware('permission:plans-delete');
        Route::delete('/massDestroy', [AdminSubscriptionPlansController::class, 'massDestroy'])->name('plans.massDestroy')->middleware('permission:plans-delete');
    });

    Route::group(['prefix' => 'subscriptions-pays',], function () {
        Route::get('/', [AdminSubscriptionPaysController::class, 'index'])->name('subscriptions.pays.index');
        Route::get('/payment/{subscriptions}', [AdminSubscriptionPaysController::class, 'payment'])->name('pays.payment');
        Route::post('/payment-subscription', [AdminSubscriptionPaysController::class, 'paymentSubscription'])->name('pays.payment.subscription');
        Route::get('/paused', [AdminSubscriptionPaysController::class, 'paused'])->name('pays.paused');
    });
});



Route::group(['prefix' => 'client', 'as' => 'client.', 'namespace' => 'client', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'subscriptions',], function () {
        Route::get('/', [ClientSubscriptionsController::class, 'index'])->name('subscriptions.index');
        Route::get('/list', [ClientSubscriptionsController::class, 'indexDatatable'])->name('subscriptions.indexDatatable');
        Route::get('/create', [ClientSubscriptionsController::class, 'create'])->name('subscriptions.create');
        Route::get('/show/{subscriptions}', [ClientSubscriptionsController::class, 'show'])->name('subscriptions.show');
        Route::get('/edit/{subscriptions}', [ClientSubscriptionsController::class, 'edit'])->name('subscriptions.edit');
        Route::post('/store', [ClientSubscriptionsController::class, 'store'])->name('subscriptions.store');
        Route::put('/update', [ClientSubscriptionsController::class, 'update'])->name('subscriptions.update');
        Route::delete('/destroy', [ClientSubscriptionsController::class, 'destroy'])->name('subscriptions.destroy');
        Route::delete('/massDestroy', [ClientSubscriptionsController::class, 'massDestroy'])->name('subscriptions.massDestroy');
    });

    Route::group(['prefix' => 'subscriptions-pays',], function () {
        Route::get('/', [ClientSubscriptionPaysController::class, 'index'])->name('subscriptions.pays.index');
        //acciones pagar
        Route::get('/payment/{subscriptions}', [ClientSubscriptionPaysController::class, 'payment'])->name('pays.payment');
        Route::post('/payment-subscription', [ClientSubscriptionPaysController::class, 'paymentSubscription'])->name('pays.payment.subscription');
        Route::get('/paused', [ClientSubscriptionPaysController::class, 'paused'])->name('pays.paused');
        Route::get('/payment-subscription-success', [ClientSubscriptionPaysController::class, 'paymentSuccess'])->name('pays.payment.success');
        Route::get('/payment-subscription-error', [ClientSubscriptionPaysController::class, 'paymentError'])->name('pays.payment.error');

    });

});

