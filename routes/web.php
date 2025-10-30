<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AcademicYearsController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\DataChangeHistoryController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\LectureraccountsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainingParticipantController;
use App\Http\Controllers\TuitionFeeController;
use App\Http\Controllers\StudentOrganizationController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ScholarshipRecipientsController;
use App\Http\Controllers\ThesisDefensesController;
use App\Http\Controllers\ThesisExaminersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\BuildingsController;

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
    Route::resource('payments', PaymentController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('course', CoursesController::class);
    Route::resource('alumni', AlumniController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('training-participant', TrainingParticipantController::class);
    Route::resource('tuition-fee', TuitionFeeController::class);
    Route::resource('course-registration', CourseRegistrationController::class);
    Route::resource('student-organizations', StudentOrganizationController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('thesis-defenses', ThesisDefensesController::class);
    Route::resource('thesis-examiner', ThesisExaminersController::class);
    Route::resource('scholarship-recipients', ScholarshipRecipientsController::class);
    Route::resource('buildings', BuildingsController::class);
});
