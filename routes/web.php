<?php

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

// -- Emails start ----
Route::name("emails")->prefix("emails")->group(function () {
    Route::get('/made-application', function () {
        Mail::to('student@woodside.edu')->send(new ApplicationMail());
        return new ApplicationMail();
    });
});
// -- Emails end ----

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
