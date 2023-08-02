<?php

use App\Http\Controllers\ApprovalRequestsController;
use App\Http\Controllers\DiariesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DocumentationsController;
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
    return view('layouts.welcome');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::resource('/users', UsersController::class);
Route::resource('/documentations', DocumentationsController::class);
Route::resource('/diaries', DiariesController::class);
Route::resource('/approval-requests', ApprovalRequestsController::class);
