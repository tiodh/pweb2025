<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AcademicYearsController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DataChangeHistoryController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\LectureraccountsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('universities', UniversityController::class);
    Route::resource('academic-years', AcademicYearsController::class);
    Route::resource('activity-logs', ActivityLogController::class)->only(['index', 'show', 'destroy']);
    Route::resource('data-change-history', DataChangeHistoryController::class)->only(['index', 'destroy']);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('semesters', SemesterController::class);
    Route::resource('students', StudentController::class);
    Route::resource('study-programs', StudyProgramController::class);
    Route::resource('lecturer-accounts', LectureraccountsController::class);
});
