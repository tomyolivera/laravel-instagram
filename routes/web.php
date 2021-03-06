<?php

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

Route::group(['prefix' => "user"], function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/photo/{filename}', [App\Http\Controllers\UserController::class, 'getPhoto'])->name('photo');
});

Route::group(['prefix' => "tasks"], function(){
    Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
    // Route::post('/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create');
    // Route::post('/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');
    // Route::post('/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');
});

Auth::routes();