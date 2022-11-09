<?php

use App\Http\Controllers\AuthController;
use App\Mail\ApplicationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// -- Applications start ----
Route::name("applications")->prefix("applications")->group(function () {

    Route::get('/email', function () {
        Mail::to('student@woodside.edu')->send(new ApplicationMail());
        return new ApplicationMail();
    });

    Route::name("choice")->prefix("choice")->group(function () {

        Route::get('students', [AuthController::class, 'studentChoice']);
        Route::post('students', [AuthController::class, 'studentApplication']);

        Route::get('lecturers', [AuthController::class, 'lecturerChoice']);
        Route::post('lecturers', [AuthController::class, 'lecturerApplication']);

        Route::get('staff', [AuthController::class, 'staffChoice']);
        Route::post('staff', [AuthController::class, 'staffApplication']);
    });
});
// -- Applications end ----

// -- Student start ----
Route::name("student")->prefix("student")->group(function () {

});
// -- Student end ----

// -- Lecturer start ----
Route::name("lecturer")->prefix("lecturer")->group(function () {
});
// -- Lecturer end ----

// -- Admin start ----
Route::name("admin")->prefix("admin")->group(function () {
});
// -- Admin end ----
