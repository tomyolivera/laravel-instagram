<?php

use App\Http\Controllers\TaskController;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::group(['prefix' => "user"], function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/photo/{filename}', [App\Http\Controllers\UserController::class, 'getPhoto'])->name('photo');
});

// Category Tasks
Route::resource('/categorytasks', App\Http\Controllers\CategoryTaskController::class);

// Tasks
Route::resource('/tasks', App\Http\Controllers\TaskController::class);

Auth::routes();