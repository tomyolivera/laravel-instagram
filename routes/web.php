<?php

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

Route::get('/', function(){
    return view('home.index');
});

// Publications
Route::group(['prefix' => 'publications'], function(){
    Route::get('/', [App\Http\Controllers\PublicationController::class, 'index'])->name('publications');
    Route::get('/{id}', [App\Http\Controllers\PublicationController::class, 'getPublication'])->name('publications.publication');
    Route::get('/create', [App\Http\Controllers\PublicationController::class, 'create'])->name('publications.create');
    Route::post('/store', [App\Http\Controllers\PublicationController::class, 'store'])->name('publications.store');
    Route::get('/photo/{filename}', [App\Http\Controllers\PublicationController::class, 'getPhoto'])->name('publications.photo');
    Route::get('/delete/{id}', [App\Http\Controllers\PublicationController::class, 'destroy'])->name('publications.delete');
    // Route::post('/like/{id}', [App\Http\Controllers\PublicationController::class, 'like'])->name('publications.like');
    
    // Comments
    Route::get('/comment/delete/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.delete');
    Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
});


// User
Route::group(['prefix' => "user"], function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('/updatePhoto', [App\Http\Controllers\UserController::class, 'updatePhoto'])->name('user.update_photo');
    Route::get('/photo/{filename}', [App\Http\Controllers\UserController::class, 'getPhoto'])->name('user.photo');
    Route::post('/darkMode', [App\Http\Controllers\UserController::class, 'setDarkMode'])->name('user.darkmode');
});

Route::group(['prefix' => "profile"], function(){
    Route::get('/{username}', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::get('/photo/{filename}', [App\Http\Controllers\UserController::class, 'getPhoto'])->name('profile.photo');
});

// Tasks
Route::resource('/tasks', App\Http\Controllers\TaskController::class);

// Category Tasks
Route::resource('/categorytasks', App\Http\Controllers\CategoryTaskController::class);

// Login & Register
Auth::routes();