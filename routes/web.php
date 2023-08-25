<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApprovalRequestsController;
use App\Http\Controllers\DiariesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DocumentationsController;


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

Auth::routes();
Route::get('/', function () {
    return view('layouts.welcome');
});


 // This is from not-authorized.blade.php //  
Route::get('/not-authorized', function(){
    return view('auth.not-authorized');
})->name('not-authorized');

// This is the middleware to check the route access if not log in, user will not directly access the pages //
Route::middleware('checkRouteAccess')->group(function(){
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::resource('/users', UsersController::class);
    Route::resource('/documentations', DocumentationsController::class);
    // Diaries //
    Route::resource('/diaries', DiariesController::class);
    Route::get('/print/diaries/{id}',[App\Http\Controllers\DiariesController::class, 'print'])->name('diaries.print');
    // Approval Requests //
    Route::resource('/approval-requests', ApprovalRequestsController::class);
    Route::get('/print/approval-requests/{id}',[App\Http\Controllers\ApprovalRequestsController::class, 'print'])->name('approval-requests.print');
    Route::put('/approve/approval-requests/{id}',[App\Http\Controllers\ApprovalRequestsController::class, 'approve'])->name('approval-requests.approve');
    Route::put('/reject/approval-requests/{id}',[App\Http\Controllers\ApprovalRequestsController::class, 'reject'])->name('approval-requests.reject');
});

