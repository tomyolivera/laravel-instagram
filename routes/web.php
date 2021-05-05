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
    Route::get('/hasPermission', [App\Http\Controllers\RoleController::class, 'getAuthUserPermissions'])->name('user.hasPermission');
    Route::get('/userIsAllowedToByRole/{role}', [App\Http\Controllers\RoleController::class, 'userIsAllowedToByRole'])->name('user.userIsAllowedToByRole');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('/updatePhoto', [App\Http\Controllers\UserController::class, 'updatePhoto'])->name('user.update_photo');
    Route::get('/photo/{filename}', [App\Http\Controllers\UserController::class, 'getPhoto'])->name('user.photo');
    Route::post('/darkMode', [App\Http\Controllers\UserController::class, 'setDarkMode'])->name('user.darkmode');
    Route::delete('/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

    // Users
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'getUsers']);
    Route::post('/users/delete', [App\Http\Controllers\AdminController::class, 'deleteUser']);

    // Roles
    Route::resource('/roles', App\Http\Controllers\RoleController::class);

    // Statistics
    Route::get('/statistics', [App\Http\Controllers\AdminController::class, 'getStatistics']);
});

// Google
Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

// Facebook
Route::get('auth/facebook', [App\Http\Controllers\FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [App\Http\Controllers\FacebookController::class, 'handleFacebookCallback']);

// Github
Route::get('auth/github', [App\Http\Controllers\GithubController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [App\Http\Controllers\GithubController::class, 'handleGithubCallback']);