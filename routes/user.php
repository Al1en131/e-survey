<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->name('home.')->group(function () {
    Route::get('/survey/{slug}', 'index')->name('index');

    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/survey/{slug}/start', 'startsurvey')->name('survey.start');
        Route::get('/survey/{slug}/q', 'question')->name('question');
        Route::post('/answer/{slug}/q', 'storeanswers')->name('answer');
        Route::get('/answer/end', 'endAnswer')->name('answer.end');
    });
});

Route::middleware(['web'])->group(function () {
    Route::post('/answer/{slug}/q', [HomeController::class, 'storeAnswers'])->name('answer');
});
