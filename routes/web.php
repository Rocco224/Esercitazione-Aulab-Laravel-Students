<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::resource('students', StudentController::class);
    Route::resource('courses', App\Http\Controllers\CourseController::class);
    Route::post('students/email-to/{id}', [StudentController::class, 'coursesEmail'])->name('students.emailto');
    Route::delete('students/destroy-email/{id}', [StudentController::class, 'destroyEmail'])->name('students.destroyEmail');

});