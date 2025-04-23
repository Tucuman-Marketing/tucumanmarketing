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

Route::prefix('setting-company')->group(function() {
    Route::get('/', 'Admin\SettingCompanyController@index')->name('setting.company.index')->middleware('permission:setting-company-view');
    //Route::get('/setting-company-list-datatable', 'ExpensesController@listExpensesDatatable')->name('setting.company.list')->middleware('permission:setting-company-view');
    Route::get('/view/{id}', 'Admin\SettingCompanyController@view')->name('setting.company.view')->middleware('permission:setting-company-view');
    Route::get('/create', 'Admin\SettingCompanyController@create')->name('setting.company.create')->middleware('permission:setting-company-create');
    Route::post('/store', 'Admin\SettingCompanyController@store')->name('setting.company.store')->middleware('permission:setting-company-create');
    Route::get('/edit/{id}', 'Admin\SettingCompanyController@edit')->name('setting.company.edit')->middleware('permission:setting-company-edit');
    Route::put('/update/{id}', 'Admin\SettingCompanyController@update')->name('setting.company.update')->middleware('permission:setting-company-edit');
    Route::delete('/delete', 'Admin\SettingCompanyController@delete')->name('setting.company.delete')->middleware('permission:setting-company-delete');

});


Route::prefix('setting-email')->group(function() {
    Route::get('/', 'Admin\SettingEmailController@index')->name('setting.email.index')->middleware('permission:setting-email-view');
    //Route::get('/setting-email-list-datatable', 'Admin\SettingEmailController@listExpensesDatatable')->name('setting.email.list')->middleware('permission:setting-email-view');
    Route::get('/view/{id}', 'Admin\SettingEmailController@view')->name('setting.email.view')->middleware('permission:setting-email-view');
    Route::get('/create', 'Admin\SettingEmailController@create')->name('setting.email.create')->middleware('permission:setting-email-create');
    Route::post('/store', 'Admin\SettingEmailController@store')->name('setting.email.store')->middleware('permission:setting-email-create');
    Route::get('/edit/{id}', 'Admin\SettingEmailController@edit')->name('setting.email.edit')->middleware('permission:setting-email-edit');
    Route::put('/update', 'Admin\SettingEmailController@update')->name('setting.email.update')->middleware('permission:setting-email-edit');
    Route::delete('/delete', 'Admin\SettingEmailController@delete')->name('setting.email.delete')->middleware('permission:setting-email-delete');

});


Route::prefix('setting-paymet')->group(function() {
    Route::get('/', 'Admin\SettingPaymetController@index')->name('setting.paymet.index')->middleware('permission:setting-paymet-view');
    //Route::get('/setting-paymet-list-datatable', 'Admin\SettingPaymetController@listExpensesDatatable')->name('setting.paymet.list')->middleware('permission:setting-paymet-view');
    Route::get('/view/{id}', 'Admin\SettingPaymetController@view')->name('setting.paymet.view')->middleware('permission:setting-paymet-view');
    Route::get('/create', 'Admin\SettingPaymetController@create')->name('setting.paymet.create')->middleware('permission:setting-paymet-create');
    Route::post('/store', 'Admin\SettingPaymetController@store')->name('setting.paymet.store')->middleware('permission:setting-paymet-create');
    Route::get('/edit/{id}', 'Admin\SettingPaymetController@edit')->name('setting.paymet.edit')->middleware('permission:setting-paymet-edit');
    Route::put('/update', 'Admin\SettingPaymetController@update')->name('setting.paymet.update')->middleware('permission:setting-paymet-edit');
    Route::delete('/delete', 'Admin\SettingPaymetController@delete')->name('setting.paymet.delete')->middleware('permission:setting-paymet-delete');

});