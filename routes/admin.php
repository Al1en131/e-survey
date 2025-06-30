<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('/step/{step}/destroy', [StepController::class, 'destroy'])->name('step.destroy');
    Route::get('/media/{media}/destroy', [MediaController::class, 'destroy'])->name('media.destroy');

    Route::controller(SurveyController::class)->prefix('survey')->name('survey.')->group(function () {
        Route::post('/update/publish/{survey}', 'updatepublish')->name('update.survey.publish');
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{survey}/update', 'update')->name('update');
        Route::get('/{id}/delete', 'destroy')->name('delete');
    });

    Route::controller(AnswerController::class)->prefix('answer')->name('answer.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/survey/{survey}/participant', 'detail')->name('detail');
        Route::get('/survey/{survey}/participant/chart', 'chart')->name('chart');
        Route::get('/survey/{survey}/participant/{participant}','participant')->name('participant');
    });

    Route::controller(ManagementController::class)->prefix('management')->name('management.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::post('store', 'store')->name('store');
        Route::get('{management}/edit', 'edit')->name('edit');
        Route::put('{management}/update', 'update')->name('update');
    });
});
