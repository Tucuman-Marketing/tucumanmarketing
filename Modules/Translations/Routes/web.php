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



Route::group(['prefix' => 'translate'], function () {
    Route::get('/', 'TranslationsController@index')->name('translations.index');
    Route::get('/create', 'TranslationsController@create')->name('translations.create');
    Route::post('/', 'TranslationsController@store')->name('translations.store');
    Route::get('/{id}/edit', 'TranslationsController@edit')->name('translations.edit');
    Route::put('/{id}', 'TranslationsController@update')->name('translations.update');
    Route::delete('/{id}', 'TranslationsController@destroy')->name('translations.destroy');
});


Route::group(['prefix' => 'language'], function () {
    Route::get('/', 'LanguageController@index')->name('language.index');
    Route::get('/create', 'LanguageController@create')->name('language.create');
    Route::post('/', 'LanguageController@store')->name('language.store');
    Route::get('/{id}/edit', 'LanguageController@edit')->name('language.edit');
    Route::put('/{id}', 'LanguageController@update')->name('language.update');
    Route::delete('/{id}', 'LanguageController@destroy')->name('language.destroy');
    Route::get('/{id}/edit-status', 'LanguageController@editStatus')->name('language.edit-status');

});
