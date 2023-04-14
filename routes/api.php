<?php

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
Route::group(['middleware' => 'apiUser'], function () {
    Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login'])->name('login');
});
    Route::post('/register', [App\Http\Controllers\Api\RegisterController::class, 'register'])->name('register');
    Route::get('/unauthenticated', function () {
        return response()->json(['message' => "Unauthenticated"], 401);
    })->name('api.unauthenticated');
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/get-activities-by-date-range', [App\Http\Controllers\Api\MemberController::class, 'rangeActivities'])->name('activities');
});

