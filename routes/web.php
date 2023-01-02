<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmailingController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\ApplicationRegistrationController;
use App\Http\Controllers\Routing;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! -1
|
*/

Route::get('/', function () {
    return view('index');
})->name('/');


// -- Login and Logout start ----
Route::prefix("login")->group(function () {
    Route::get('/', [Routing::class, 'loginRoute']);
    Route::post('/validation', [AuthController::class, 'login']);
});
Route::get('logout', [AuthController::class, 'logout']);
// -- Login Logout end ----


// -- Applications and Registration start ----
Route::prefix("applications")->group(function () {

    Route::name("choice")->prefix("choice")->group(function () {

        //user choices
        Route::get('students', [AuthController::class, 'studentChoice']);
        Route::get('lecturers', [AuthController::class, 'lecturerChoice']);
        Route::get('staff', [AuthController::class, 'staffChoice']);

        //form data from user application; dependent on user choice
        Route::post('submission', [ApplicationRegistrationController::class, 'choiceApplication']);
    });
});
// -- Applications and Registration end ----

// -- Student start ----
Route::prefix("student")->group(function () {
    Route::get('/', [Routing::class, 'students']);
    Route::get('register/{application_id}/{role}', [ApplicationRegistrationController::class, 'registrationPath']);
    Route::post('register-user', [ApplicationRegistrationController::class, 'extractData']);
});
// -- Student end ----

// -- Lecturer start ----
Route::prefix("lecturer")->group(function () {
    Route::get('/', [Routing::class, 'lecturers']);
    Route::get('register/{application_id}/{role}', [ApplicationRegistrationController::class, 'registrationPath']);
    Route::post('register-user', [ApplicationRegistrationController::class, 'extractData']);
});
// -- Lecturer end ----

// -- Staff start ----
Route::prefix("staff")->group(function () {
    Route::get('/', [Routing::class, 'staff']);
    Route::get('register/{application_id}/{role}', [ApplicationRegistrationController::class, 'registrationPath']);
    Route::post('register-user', [ApplicationRegistrationController::class, 'extractData']);
});
// -- Staff end ----

// -- Admin start ----
Route::prefix("admin")->group(function () {
    Route::get('/', [Routing::class, 'admin']);

    //sending approval and e-letters of acceptance
    Route::prefix('emailing')->group(function () {
        Route::post('student-email', [ApplicationsController::class, 'studentApplications']);
        Route::post('lecturer-email', [ApplicationsController::class, 'lecturerApplications']);
        Route::post('staff-email', [ApplicationsController::class, 'staffApplications']);

        Route::post('unit-register', [EmailingController::class, 'unitRegistration']);
    });

    //admin messaging
    Route::prefix('messages')->group(function () {
        Route::post('department', [MessagingController::class, 'departmentMessage']);
        Route::post('faculty', [MessagingController::class, 'facultyMessage']);
        Route::post('course', [MessagingController::class, 'courseMessage']);
        Route::post('all-staff', [MessagingController::class, 'allStaffMessage']);
        Route::post('all-lecturers', [MessagingController::class, 'allLecturersMessage']);
        Route::post('all-students', [MessagingController::class, 'allStudentsMessage']);
    });

    //admin educative-actions
    Route::prefix('education')->group(function () {
        Route::post('add-unit', [EducationController::class, 'addUnit']);
        Route::post('add-course', [EducationController::class, 'addCourse']);
        Route::post('open-status', [EducationController::class, 'openStatus']);
        Route::post('close-status', [EducationController::class, 'closeStatus']);
    });
});
// -- Admin end ----

// -- Settings start ----
Route::prefix('images')->group(function () {
    Route::prefix('profile')->group(function () {
//        Route::get('set-image', [UserController::class, 'imageSettings']);
        Route::post('set-image', [UserController::class, 'addImage']);
    });
});
