<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestrictedAreasController;
use App\Mail\ApplicationMail;
use App\Mail\StudentMail;
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
})->name('/');

Route::name("login")->prefix("login")->group(function (){
    Route::get('/',function (){
        return view('login');
    })->name('login-page');
    Route::post('/validation',[AuthController::class, 'login']);
});

Route::get('logout',[AuthController::class, 'logout']);

// -- Applications start ----
Route::name("applications")->prefix("applications")->group(function () {

    Route::name("choice")->prefix("choice")->group(function () {

        //user choices
        Route::get('students', [AuthController::class, 'studentChoice']);
        Route::get('lecturers', [AuthController::class, 'lecturerChoice']);
        Route::get('staff', [AuthController::class, 'staffChoice']);

        //form data from user application; dependent on user choice
        Route::post('submission', [AuthController::class, 'choiceApplication']);
        Route::post('staff-submission', [AuthController::class, 'staff_choiceApplication']);

        //form data from application approved process
        Route::post('students', [AuthController::class, 'studentApplication']);
        Route::post('lecturers', [AuthController::class, 'lecturerApplication']);
        Route::post('staff', [AuthController::class, 'staffApplication']);
    });
});
// -- Applications end ----

// -- Student start ----
Route::name("student")->prefix("student")->group(function () {

    Route::get('application',function (){
        return view('students.register');
    });
});
// -- Student end ----

// -- Lecturer start ----
Route::name("lecturer")->prefix("lecturer")->group(function () {
});
// -- Lecturer end ----

// -- Admin start ----
Route::name("admin")->prefix("admin")->group(function () {
    Route::get('/',[RestrictedAreasController::class,'admin']);
    Route::get('student-email', function () {
        Mail::to('ryankinotikathurima@gmail.com')->send(new StudentMail());
        return view('index');
    });
});
// -- Admin end ----
