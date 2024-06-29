<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReponseController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'dashboard'])->name('modo.dashboard');
Route::get('/analytique', [DashboardController::class, 'analytique'])->name('modo.analytique');

Route::resource('/quiz', QuizzController::class);

Route::get('/question', [DashboardController::class, 'question'])->name('modo.question');
Route::get('/reponse', [DashboardController::class, 'reponse'])->name('modo.reponse');
