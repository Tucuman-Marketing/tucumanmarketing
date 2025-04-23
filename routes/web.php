<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRolesController;
use App\Http\Controllers\User\UserPermissionsController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\CoreForms\CoreFormController;
//auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\PasswordResetController;

//admin
use App\Http\Controllers\Admin\ComandosController;
use App\Http\Controllers\FileUpload\FileUploadController;

//use CustomersController
use App\Http\Controllers\Admin\Customers\CustomersController;

//routa para los comandos
Route::get('comandos', [ComandosController::class, 'index'])->name('comandos');
Route::get('comandos-work', [ComandosController::class, 'work'])->name('comandos.work');

//Auth
Route::group(['middleware' =>['web']], function () {
    //Login
    Route::get('login', [AuthSessionController::class, 'index'])->name('login');
    Route::post('login-store', [AuthSessionController::class, 'store'])->name('login.store');
    Route::get('logout', [AuthSessionController::class, 'destroy'])->name('logout');

    //Registro
    Route::get('register', [RegisteredController::class, 'create'])->name('register');
    Route::post('register-store', [RegisteredController::class, 'store'])->name('register.store');

    //Recupear Pasword
    Route::get('reset-pasword', [PasswordResetController::class, 'index'])->name('password.reset.index');
    Route::post('reset-pasword-link', [PasswordResetController::class, 'sendLink'])->name('password.reset.link');
    Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [PasswordResetController::class, 'update'])->name('password.update');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', [CustomersController::class, 'index'])->name('customers.index')->middleware('permission:client-access');
            Route::get('/list', [CustomersController::class, 'indexDatatable'])->name('customers.indexDatatable')->middleware('permission:client-access');
            Route::get('/create', [CustomersController::class, 'create'])->name('customers.create')->middleware('permission:client-create');
            Route::get('/show/{customer}', [CustomersController::class, 'show'])->name('customers.show')->middleware('permission:client-view');
            Route::get('/edit/{customer}', [CustomersController::class, 'edit'])->name('customers.edit')->middleware('permission:client-edit');
            Route::post('/store', [CustomersController::class, 'store'])->name('customers.store')->middleware('permission:client-create');
            Route::put('/update', [CustomersController::class, 'update'])->name('customers.update')->middleware('permission:client-edit');
            Route::delete('/destroy', [CustomersController::class, 'destroy'])->name('customers.destroy')->middleware('permission:client-delete');
            Route::delete('/massDestroy', [CustomersController::class, 'massDestroy'])->name('customers.massDestroy')->middleware('permission:client-delete');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('permission:user-view');
            Route::get('/list', [UserController::class, 'indexDatatable'])->name('users.indexDatatable')->middleware('permission:user-view');
            Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:user-create');
            Route::get('/show/{object}', [UserController::class, 'show'])->name('users.show')->middleware('permission:user-view');
            Route::get('/edit/{object}', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:user-edit');
            Route::post('/store', [UserController::class, 'store'])->name('users.store')->middleware('permission:user-create');
            Route::put('/update', [UserController::class, 'update'])->name('users.update')->middleware('permission:user-edit');
            Route::delete('/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:user-delete');
            Route::delete('/massDestroy', [UserController::class, 'massDestroy'])->name('users.massDestroy')->middleware('permission:user-delete');

            //ASIGNACIONES DE ROLES A USUARIOS
            Route::post('assign-rol', [UserController::class, 'userAssingRol'])->name('user.assign.rol');
            Route::post('delete-rol', [UserController::class, 'useDeleteRol'])->name('user.delete.rol');
        });



        Route::group(['prefix' => 'user-profile'], function () {
            Route::get('/', [UserProfileController::class, 'index'])->name('user.setting.index');
            Route::put('user-change-password/{user}', [UserProfileController::class, 'changePassword'])->name('user.setting.change.password');
            Route::put('user-change-photo', [UserProfileController::class, 'changePhoto'])->name('user.setting.change.photo');
            Route::delete('user-delete-photo', [UserProfileController::class, 'deletePhoto'])->name('user.setting.delete.photo');
            Route::put('user-change-info/{user}', [UserProfileController::class, 'changeInfo'])->name('user.setting.change.info');
        });

        Route::group(['prefix' => 'roles',], function () {
            Route::get('/', [UserRolesController::class, 'index'])->name('roles.index')->middleware('permission:rol-access');
            Route::get('/list', [UserRolesController::class, 'indexDatatable'])->name('roles.indexDatatable')->middleware('permission:rol-access');
            Route::get('/create', [UserRolesController::class, 'create'])->name('roles.create')->middleware('permission:rol-create');
            Route::get('/show/{object}', [UserRolesController::class, 'show'])->name('roles.show')->middleware('permission:rol-view');
            Route::get('/edit/{object}', [UserRolesController::class, 'edit'])->name('roles.edit')->middleware('permission:rol-edit');
            Route::post('/store', [UserRolesController::class, 'store'])->name('roles.store')->middleware('permission:rol-create');
            Route::put('/update', [UserRolesController::class, 'update'])->name('roles.update')->middleware('permission:rol-edit');
            Route::delete('/destroy', [UserRolesController::class, 'destroy'])->name('roles.destroy')->middleware('permission:rol-delete');
            Route::delete('/massDestroy', [UserRolesController::class, 'massDestroy'])->name('roles.massDestroy')->middleware('permission:rol-delete');
        });

        Route::group(['prefix' => 'permissions',], function () {
            Route::get('/', [UserPermissionsController::class, 'index'])->name('permissions.index')->middleware('permission:permission-access');
            Route::get('/list', [UserPermissionsController::class, 'indexDatatable'])->name('permissions.indexDatatable')->middleware('permission:permission-access');
            Route::get('/create', [UserPermissionsController::class, 'create'])->name('permissions.create')->middleware('permission:permission-create');
            Route::get('/show/{object}', [UserPermissionsController::class, 'show'])->name('permissions.show')->middleware('permission:permission-view');
            Route::get('/edit/{object}', [UserPermissionsController::class, 'edit'])->name('permissions.edit')->middleware('permission:permission-edit');
            Route::post('/store', [UserPermissionsController::class, 'store'])->name('permissions.store')->middleware('permission:permission-create');
            Route::put('/update', [UserPermissionsController::class, 'update'])->name('permissions.update')->middleware('permission:permission-edit');
            Route::delete('/destroy', [UserPermissionsController::class, 'destroy'])->name('permissions.destroy')->middleware('permission:permission-delete');
            Route::delete('/massDestroy', [UserPermissionsController::class, 'massDestroy'])->name('permissions.massDestroy')->middleware('permission:permission-delete');
        });

    });




});
