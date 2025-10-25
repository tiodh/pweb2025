<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\AcademicYearsController;
use App\Http\Controllers\SemesterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('universities', UniversityController::class);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('academic-years', AcademicYearsController::class);
    Route::resource('semesters', SemesterController::class);
});
