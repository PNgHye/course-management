<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;

Route::resource('courses', CourseController::class);
Route::get('courses/restore/{id}', [CourseController::class, 'restore'])->name('courses.restore');

Route::resource('lessons', LessonController::class);
Route::resource('enrollments', EnrollmentController::class);


Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments/store', [EnrollmentController::class, 'store'])->name('enrollments.store');
Route::get('/enrollments/{course_id?}', [EnrollmentController::class, 'index'])->name('enrollments.index');


