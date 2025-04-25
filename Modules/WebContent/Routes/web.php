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
use Modules\WebContent\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('public.index');

Route::get('/posts', [PublicController::class, 'posts'])->name('public.posts');
Route::get('/postDetails/{slug}', [PublicController::class, 'postDetails'])->name('public.postDetails');
Route::get('/postsByCategory/{category}', [PublicController::class, 'postsByCategory'])->name('public.postsByCategory');
Route::get('/postsByTag/{tag}', [PublicController::class, 'postsByTag'])->name('public.postsByTag');

Route::get('/jobs', [PublicController::class, 'jobs'])->name('public.jobs');
Route::get('/jobsByCategory/{category}', [PublicController::class, 'jobsByCategory'])->name('public.jobsByCategory');
Route::get('/jobsByTag/{tag}', [PublicController::class, 'jobsByTag'])->name('public.jobsByTag');
Route::get('/jobDetails/{slug}', [PublicController::class, 'jobDetails'])->name('public.jobDetails');
Route::get('/jobEnrollment/{slug}', [PublicController::class, 'jobEnrollment'])->name('public.jobEnrollment');
Route::post('/jobEnrollment', [PublicController::class, 'jobEnrollmentStore'])->name('public.jobEnrollment.store');
Route::post('/jobSearch', [PublicController::class, 'jobSearch'])->name('public.jobSearch');



Route::get('/positions', [PublicController::class, 'positions'])->name('public.positions');
Route::get('/about', [PublicController::class, 'about'])->name('public.about');
Route::get('/faq', [PublicController::class, 'faq'])->name('public.faq');
Route::get('/uploadCV', [PublicController::class, 'uploadCV'])->name('public.uploadCV');
Route::get('/process', [PublicController::class, 'processWork'])->name('public.processWork');

Route::get('/contact', [PublicController::class, 'contact'])->name('public.contact');
Route::post('/contactSubmit', [PublicController::class, 'contactSubmit'])->name('public.contactSubmit');

Route::get('/company', [PublicController::class, 'company'])->name('public.company');
Route::post('/companySubmit', [PublicController::class, 'contactCompanySubmit'])->name('public.contactCompanySubmit');
