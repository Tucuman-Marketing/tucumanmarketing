<?php

use Modules\Blog\Http\Controllers\Admin\BlogPostController;
use Modules\Blog\Http\Controllers\Admin\BlogTagController;
use Modules\Blog\Http\Controllers\Admin\BlogStatusController;
use Modules\Blog\Http\Controllers\Admin\BlogCategoryController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Posts
    Route::group(['prefix' => 'posts',], function () {
        Route::get('/', [BlogPostController::class, 'index'])->name('blogs.posts.index')->middleware('permission:blog-access');
        Route::get('/list', [BlogPostController::class, 'indexDatatable'])->name('blogs.posts.indexDatatable')->middleware('permission:blog-access');
        Route::get('/create', [BlogPostController::class, 'create'])->name('blogs.posts.create')->middleware('permission:blog-create');
        Route::get('/show/{posts}', [BlogPostController::class, 'show'])->name('blogs.posts.show')->middleware('permission:blog-view');
        Route::get('/edit/{posts}', [BlogPostController::class, 'edit'])->name('blogs.posts.edit')->middleware('permission:blog-edit');
        Route::post('/store', [BlogPostController::class, 'store'])->name('blogs.posts.store')->middleware('permission:blog-create');
        Route::put('/update', [BlogPostController::class, 'update'])->name('blogs.posts.update')->middleware('permission:blog-edit');
        Route::delete('/destroy', [BlogPostController::class, 'destroy'])->name('blogs.posts.destroy')->middleware('permission:blog-delete');
        Route::delete('/massDestroy', [BlogPostController::class, 'massDestroy'])->name('blogs.posts.massDestroy')->middleware('permission:blog-delete');
    });

    // Blog Tag
    Route::group(['prefix' => 'blogs-tags',], function () {
        Route::get('/', [BlogTagController::class, 'index'])->name('blogs.tags.index')->middleware('permission:blog-access');
        Route::get('/list', [BlogTagController::class, 'indexDatatable'])->name('blogs.tags.indexDatatable')->middleware('permission:blog-access');
        Route::get('/create', [BlogTagController::class, 'create'])->name('blogs.tags.create')->middleware('permission:blog-create');
        Route::get('/show/{object}', [BlogTagController::class, 'show'])->name('blogs.tags.show')->middleware('permission:blog-view');
        Route::get('/edit/{object}', [BlogTagController::class, 'edit'])->name('blogs.tags.edit')->middleware('permission:blog-edit');
        Route::post('/store', [BlogTagController::class, 'store'])->name('blogs.tags.store')->middleware('permission:blog-create');
        Route::put('/update', [BlogTagController::class, 'update'])->name('blogs.tags.update')->middleware('permission:blog-edit');
        Route::delete('/destroy', [BlogTagController::class, 'destroy'])->name('blogs.tags.destroy')->middleware('permission:blog-delete');
        Route::delete('/massDestroy', [BlogTagController::class, 'massDestroy'])->name('blogs.tags.massDestroy')->middleware('permission:blog-delete');
    });

     // Blog Status
     Route::group(['prefix' => 'blogs-status',], function () {
        Route::get('/', [BlogStatusController::class, 'index'])->name('blogs.status.index')->middleware('permission:blog-access');
        Route::get('/list', [BlogStatusController::class, 'indexDatatable'])->name('blogs.status.indexDatatable')->middleware('permission:blog-access');
        Route::get('/create', [BlogStatusController::class, 'create'])->name('blogs.status.create')->middleware('permission:blog-create');
        Route::get('/show/{status}', [BlogStatusController::class, 'show'])->name('blogs.status.show')->middleware('permission:blog-view');
        Route::get('/edit/{status}', [BlogStatusController::class, 'edit'])->name('blogs.status.edit')->middleware('permission:blog-edit');
        Route::post('/store', [BlogStatusController::class, 'store'])->name('blogs.status.store')->middleware('permission:blog-create');
        Route::put('/update', [BlogStatusController::class, 'update'])->name('blogs.status.update')->middleware('permission:blog-edit');
        Route::delete('/destroy', [BlogStatusController::class, 'destroy'])->name('blogs.status.destroy')->middleware('permission:blog-delete');
        Route::delete('/massDestroy', [BlogStatusController::class, 'massDestroy'])->name('blogs.status.massDestroy')->middleware('permission:blog-delete');
    });

    // Blog Categories
    Route::group(['prefix' => 'blogs-categories',], function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('blogs.category.index')->middleware('permission:blog-access');
        Route::get('/list', [BlogCategoryController::class, 'indexDatatable'])->name('blogs.category.indexDatatable')->middleware('permission:blog-access');
        Route::get('/create', [BlogCategoryController::class, 'create'])->name('blogs.category.create')->middleware('permission:blog-create');
        Route::get('/show/{category}', [BlogCategoryController::class, 'show'])->name('blogs.category.show')->middleware('permission:blog-view');
        Route::get('/edit/{category}', [BlogCategoryController::class, 'edit'])->name('blogs.category.edit')->middleware('permission:blog-edit');
        Route::post('/store', [BlogCategoryController::class, 'store'])->name('blogs.category.store')->middleware('permission:blog-create');
        Route::put('/update', [BlogCategoryController::class, 'update'])->name('blogs.category.update')->middleware('permission:blog-edit');
        Route::delete('/destroy', [BlogCategoryController::class, 'destroy'])->name('blogs.category.destroy')->middleware('permission:blog-delete');
        Route::delete('/massDestroy', [BlogCategoryController::class, 'massDestroy'])->name('blogs.category.massDestroy')->middleware('permission:blog-delete');
    });

});
