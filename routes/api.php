<?php

use App\Http\Controllers\learningAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ignore these routes. was testing simple api methods/actions
Route::prefix('learning')->group(function () {
    Route::get('data', [learningAPI::class, 'getData']);
    Route::get('course/{id?}', [learningAPI::class, 'listCourses']);
    Route::post('add-course', [learningAPI::class, 'addCourse']);
    Route::put('update-course', [learningAPI::class, 'updateCourse']);
    Route::get('search/{name}', [learningAPI::class, 'search']);
});

