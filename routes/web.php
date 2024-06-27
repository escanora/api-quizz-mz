<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'dashboard'])->name('modo.dashboard');
Route::get('/analytique', [DashboardController::class, 'analytique'])->name('modo.analytique');

Route::resource('/quiz', QuizController::class);

Route::get('/question', [DashboardController::class, 'question'])->name('modo.question');
Route::get('/reponse', [DashboardController::class, 'reponse'])->name('modo.reponse');
