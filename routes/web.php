<?php

use App\Http\Controllers\StudentAccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UniversityController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('student_accounts',StudentAccountController::class);

Route::middleware('auth')->group(function () {
    Route::resource('universities', UniversityController::class);
});
