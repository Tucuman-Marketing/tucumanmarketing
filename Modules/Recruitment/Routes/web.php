<?php

use Modules\Recruitment\Http\Controllers\Admin\JobsController;
use Modules\Recruitment\Http\Controllers\Admin\CategoriesController;
use Modules\Recruitment\Http\Controllers\Admin\SkillsController;
use Modules\Recruitment\Http\Controllers\Admin\TagsController;
use Modules\Recruitment\Http\Controllers\Admin\StatusController;
use Modules\Recruitment\Http\Controllers\Admin\CandidatesController;
use Modules\Recruitment\Http\Controllers\Admin\CandidatesStatusController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Jobs
    Route::group(['prefix' => 'recruitment-jobs',], function () {
        Route::get('/', [JobsController::class, 'index'])->name('recruitment.jobs.index')->middleware('permission:recruitment-jobs-access');
        Route::get('/list', [JobsController::class, 'indexDatatable'])->name('recruitment.jobs.indexDatatable')->middleware('permission:recruitment-jobs-access');
        Route::get('/create', [JobsController::class, 'create'])->name('recruitment.jobs.create')->middleware('permission:recruitment-jobs-create');
        Route::get('/show/{object}', [JobsController::class, 'show'])->name('recruitment.jobs.show')->middleware('permission:recruitment-jobs-view');
        Route::get('/edit/{object}', [JobsController::class, 'edit'])->name('recruitment.jobs.edit')->middleware('permission:recruitment-jobs-edit');
        Route::post('/store', [JobsController::class, 'store'])->name('recruitment.jobs.store')->middleware('permission:recruitment-jobs-create');
        Route::put('/update', [JobsController::class, 'update'])->name('recruitment.jobs.update')->middleware('permission:recruitment-jobs-edit');
        Route::delete('/destroy', [JobsController::class, 'destroy'])->name('recruitment.jobs.destroy')->middleware('permission:recruitment-jobs-delete');
        Route::delete('/massDestroy', [JobsController::class, 'massDestroy'])->name('recruitment.jobs.massDestroy')->middleware('permission:recruitment-jobs-delete');

        //candiadtos relacionados
        Route::get('/candidates/{object}', [JobsController::class, 'candidates'])->name('recruitment.jobs.candidates.show')->middleware('permission:recruitment-jobs-view');
        //candidatesByJob
        Route::get('/candidatesByJob/{jobUuid}', [JobsController::class, 'candidatesByJob'])->name('recruitment.jobs.candidatesByJob.indexDatatable')->middleware('permission:recruitment-jobs-view');
        Route::put('/changeStatus', [JobsController::class, 'ChangeStatus'])->name('recruitment.jobs.candidatesByJob.changeStatus');
    });         

    // candidates
    Route::group(['prefix' => 'recruitment-candidates',], function () {
        Route::get('/', [CandidatesController::class, 'index'])->name('recruitment.candidates.index')->middleware('permission:recruitment-candidates-access');
        Route::get('/list', [CandidatesController::class, 'indexDatatable'])->name('recruitment.candidates.indexDatatable')->middleware('permission:recruitment-candidates-access');
        Route::get('/create', [CandidatesController::class, 'create'])->name('recruitment.candidates.create')->middleware('permission:recruitment-candidates-create');
        Route::get('/show/{object}', [CandidatesController::class, 'show'])->name('recruitment.candidates.show')->middleware('permission:recruitment-candidates-view');
        Route::get('/edit/{object}', [CandidatesController::class, 'edit'])->name('recruitment.candidates.edit')->middleware('permission:recruitment-candidates-edit');
        Route::post('/store', [CandidatesController::class, 'store'])->name('recruitment.candidates.store')->middleware('permission:recruitment-candidates-create');
        Route::put('/update', [CandidatesController::class, 'update'])->name('recruitment.candidates.update')->middleware('permission:recruitment-candidates-edit');
        Route::delete('/destroy', [CandidatesController::class, 'destroy'])->name('recruitment.candidates.destroy')->middleware('permission:recruitment-candidates-delete');
        Route::delete('/massDestroy', [CandidatesController::class, 'massDestroy'])->name('recruitment.candidates.massDestroy')->middleware('permission:recruitment-candidates-delete');
    });

     //Candidate status
     Route::group(['prefix' => 'recruitment-canidates-status',], function () {
        Route::get('/', [CandidatesStatusController::class, 'index'])->name('recruitment.candidatesStatus.index')->middleware('permission:recruitment-candidates-status-access');
        Route::get('/list', [CandidatesStatusController::class, 'indexDatatable'])->name('recruitment.candidatesStatus.indexDatatable')->middleware('permission:recruitment-candidates-status-access');
        Route::get('/create', [CandidatesStatusController::class, 'create'])->name('recruitment.candidatesStatus.create')->middleware('permission:recruitment-candidates-status-create');
        Route::get('/show/{object}', [CandidatesStatusController::class, 'show'])->name('recruitment.candidatesStatus.show')->middleware('permission:recruitment-candidates-status-view');
        Route::get('/edit/{object}', [CandidatesStatusController::class, 'edit'])->name('recruitment.candidatesStatus.edit')->middleware('permission:recruitment-candidates-status-edit');
        Route::post('/store', [CandidatesStatusController::class, 'store'])->name('recruitment.candidatesStatus.store')->middleware('permission:recruitment-candidates-status-create');
        Route::put('/update', [CandidatesStatusController::class, 'update'])->name('recruitment.candidatesStatus.update')->middleware('permission:recruitment-candidates-status-edit');
        Route::delete('/destroy', [CandidatesStatusController::class, 'destroy'])->name('recruitment.candidatesStatus.destroy')->middleware('permission:recruitment-candidates-status-delete');
        Route::delete('/massDestroy', [CandidatesStatusController::class, 'massDestroy'])->name('recruitment.candidatesStatus.massDestroy')->middleware('permission:recruitment-candidates-status-delete');
    });

    // Categories
    Route::group(['prefix' => 'recruitment-categories',], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('recruitment.categories.index')->middleware('permission:recruitment-categories-access');
        Route::get('/list', [CategoriesController::class, 'indexDatatable'])->name('recruitment.categories.indexDatatable')->middleware('permission:recruitment-categories-access');
        Route::get('/create', [CategoriesController::class, 'create'])->name('recruitment.categories.create')->middleware('permission:recruitment-categories-create');
        Route::get('/show/{object}', [CategoriesController::class, 'show'])->name('recruitment.categories.show')->middleware('permission:recruitment-categories-view');
        Route::get('/edit/{object}', [CategoriesController::class, 'edit'])->name('recruitment.categories.edit')->middleware('permission:recruitment-categories-edit');
        Route::post('/store', [CategoriesController::class, 'store'])->name('recruitment.categories.store')->middleware('permission:recruitment-categories-create');
        Route::put('/update', [CategoriesController::class, 'update'])->name('recruitment.categories.update')->middleware('permission:recruitment-categories-edit');
        Route::delete('/destroy', [CategoriesController::class, 'destroy'])->name('recruitment.categories.destroy')->middleware('permission:recruitment-categories-delete');
        Route::delete('/massDestroy', [CategoriesController::class, 'massDestroy'])->name('recruitment.categories.massDestroy')->middleware('permission:recruitment-categories-delete');
    });

    //skills
    Route::group(['prefix' => 'recruitment-skills',], function () {
        Route::get('/', [SkillsController::class, 'index'])->name('recruitment.skills.index')->middleware('permission:recruitment-skills-access');
        Route::get('/list', [SkillsController::class, 'indexDatatable'])->name('recruitment.skills.indexDatatable')->middleware('permission:recruitment-skills-access');
        Route::get('/create', [SkillsController::class, 'create'])->name('recruitment.skills.create')->middleware('permission:recruitment-skills-create');
        Route::get('/show/{object}', [SkillsController::class, 'show'])->name('recruitment.skills.show')->middleware('permission:recruitment-skills-view');
        Route::get('/edit/{object}', [SkillsController::class, 'edit'])->name('recruitment.skills.edit')->middleware('permission:recruitment-skills-edit');
        Route::post('/store', [SkillsController::class, 'store'])->name('recruitment.skills.store')->middleware('permission:recruitment-skills-create');
        Route::put('/update', [SkillsController::class, 'update'])->name('recruitment.skills.update')->middleware('permission:recruitment-skills-edit');
        Route::delete('/destroy', [SkillsController::class, 'destroy'])->name('recruitment.skills.destroy')->middleware('permission:recruitment-skills-delete');
        Route::delete('/massDestroy', [SkillsController::class, 'massDestroy'])->name('recruitment.skills.massDestroy')->middleware('permission:recruitment-skills-delete');
    });

    //status
    Route::group(['prefix' => 'recruitment-status',], function () {
        Route::get('/', [StatusController::class, 'index'])->name('recruitment.status.index')->middleware('permission:recruitment-status-access');
        Route::get('/list', [StatusController::class, 'indexDatatable'])->name('recruitment.status.indexDatatable')->middleware('permission:recruitment-status-access');
        Route::get('/create', [StatusController::class, 'create'])->name('recruitment.status.create')->middleware('permission:recruitment-status-create');
        Route::get('/show/{object}', [StatusController::class, 'show'])->name('recruitment.status.show')->middleware('permission:recruitment-status-view');
        Route::get('/edit/{object}', [StatusController::class, 'edit'])->name('recruitment.status.edit')->middleware('permission:recruitment-status-edit');
        Route::post('/store', [StatusController::class, 'store'])->name('recruitment.status.store')->middleware('permission:recruitment-status-create');
        Route::put('/update', [StatusController::class, 'update'])->name('recruitment.status.update')->middleware('permission:recruitment-status-edit');
        Route::delete('/destroy', [StatusController::class, 'destroy'])->name('recruitment.status.destroy')->middleware('permission:recruitment-status-delete');
        Route::delete('/massDestroy', [StatusController::class, 'massDestroy'])->name('recruitment.status.massDestroy')->middleware('permission:recruitment-status-delete');
    });

    //tags
    Route::group(['prefix' => 'recruitment-tags',], function () {
        Route::get('/', [TagsController::class, 'index'])->name('recruitment.tags.index')->middleware('permission:recruitment-tags-access');
        Route::get('/list', [TagsController::class, 'indexDatatable'])->name('recruitment.tags.indexDatatable')->middleware('permission:recruitment-tags-access');
        Route::get('/create', [TagsController::class, 'create'])->name('recruitment.tags.create')->middleware('permission:recruitment-tags-create');
        Route::get('/show/{object}', [TagsController::class, 'show'])->name('recruitment.tags.show')->middleware('permission:recruitment-tags-view');
        Route::get('/edit/{object}', [TagsController::class, 'edit'])->name('recruitment.tags.edit')->middleware('permission:recruitment-tags-edit');
        Route::post('/store', [TagsController::class, 'store'])->name('recruitment.tags.store')->middleware('permission:recruitment-tags-create');
        Route::put('/update', [TagsController::class, 'update'])->name('recruitment.tags.update')->middleware('permission:recruitment-tags-edit');
        Route::delete('/destroy', [TagsController::class, 'destroy'])->name('recruitment.tags.destroy')->middleware('permission:recruitment-tags-delete');
        Route::delete('/massDestroy', [TagsController::class, 'massDestroy'])->name('recruitment.tags.massDestroy')->middleware('permission:recruitment-tags-delete');
    });

});
