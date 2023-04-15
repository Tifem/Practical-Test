<?php

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


Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('home');

Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/home', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('home');
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-home');
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user_home');
                Route::get('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete_users');
                Route::post('/update', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update_user');
                Route::get('/details', [App\Http\Controllers\UserController::class, 'details'])->name('user_details');
                Route::post('/create_user', [App\Http\Controllers\UserController::class, 'add'])->name('create_user');
                Route::post('/edit_user', [App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
            });

            Route::group(['prefix' => 'activity'], function () {
                Route::get('/', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity_home');
                Route::get('/delete', [App\Http\Controllers\ActivityController::class, 'delete'])->name('delete_activities');
                Route::post('/update', [App\Http\Controllers\ActivityController::class, 'updateActivity'])->name('update_activities');
                Route::get('/details', [App\Http\Controllers\ActivityController::class, 'details'])->name('activity_details');
                Route::post('/create_activities', [App\Http\Controllers\ActivityController::class, 'add'])->name('create_activities');
            });
        });
    });
    Route::group(['middleware' => 'member'], function () {
        Route::group(['prefix' => 'member'], function () {
            Route::get('/', [App\Http\Controllers\MemberController::class, 'index'])->name('member_home');
        });
    });
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});