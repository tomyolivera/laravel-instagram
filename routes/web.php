<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Publications
Route::group(['prefix' => 'publications'], function(){
    Route::get('/', [App\Http\Controllers\PublicationController::class, 'index'])->name('publications');
    Route::get('/get/{id}', [App\Http\Controllers\PublicationController::class, 'getPublication'])->name('publications.publication');
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
    // Route::get('/can/{permission}', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/can/{permission}', [App\Http\Controllers\UserController::class, 'userCan'])->name('user.hasPermission');
    Route::get('/userIsAllowedToByRole/{role}', [App\Http\Controllers\RoleController::class, 'userIsAllowedToByRole'])->name('user.userIsAllowedToByRole');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('/updatePhoto', [App\Http\Controllers\UserController::class, 'updatePhoto'])->name('user.update_photo');
    Route::get('/photo/{filename}', [App\Http\Controllers\UserController::class, 'getPhoto'])->name('user.photo');
    Route::post('/darkMode', [App\Http\Controllers\UserController::class, 'setDarkMode'])->name('user.darkmode');
    Route::delete('/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});

Route::group(['prefix' => "profile"], function(){
    Route::get('/{username}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
});

// Tasks
Route::resource('/tasks', App\Http\Controllers\TaskController::class);

// Category Tasks
Route::resource('/categorytasks', App\Http\Controllers\CategoryTaskController::class);

// Login & Register
Auth::routes();

// Admin | Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'permission:get users'], function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name("dashboard");

    // Users
    Route::get('/users', [App\Http\Controllers\DashboardController::class, 'getUsers'])->name("dashboard.users");
    Route::get('/users/get/{id}', [App\Http\Controllers\DashboardController::class, 'getUser'])->name("dashboard.user");
    Route::get('/users/delete/{id}', [App\Http\Controllers\DashboardController::class, 'destroyUser'])->name("dashboard.userDelete");
    
    // Roles and permissions
    Route::get('/roles', [App\Http\Controllers\DashboardController::class, 'getRoles'])->name("dashboard.roles");
    Route::get('/roles/get/{id}', [App\Http\Controllers\DashboardController::class, 'getUsers'])->name("dashboard.role");
});

Route::group(['prefix' => '/setRolesAndPermissions'], function(){
    // Permission::create(["name" => "basic"]);
    // Permission::create(["name" => "get users"]);
    // Permission::create(["name" => "get roles"]);
    // Permission::create(["name" => "get permissions"]);
    // Permission::create(["name" => "edit users"]);
    // Permission::create(["name" => "edit publications"]);
    // Permission::create(["name" => "edit roles"]);
    // Permission::create(["name" => "edit permissions"]);
    // Permission::create(["name" => "delete users"]);
    // Permission::create(["name" => "delete publications"]);
    // Permission::create(["name" => "delete roles"]);
    // Permission::create(["name" => "delete permissions"]);
    // Permission::create(["name" => "create roles"]);
    // Permission::create(["name" => "create permissions"]);
    // Permission::create(["name" => "super admin"]);
    // Permission::create(["name" => "owner"]);

    // $user = Role::create(["name" => "user", "color" => "secondary"]);
    // $user->givePermissionTo("basic");

    // $staff = Role::create(["name" => "staff", "color" => "info"]);
    // $staff->givePermissionTo([
    //     "basic", "get users", "get roles", "get permissions"
    // ]);

    // $mod = Role::create(["name" => "mod", "color" => "success"]);
    // $mod->givePermissionTo([
    //     "basic", "get roles", "get users", "edit roles", 
    //     "edit publications", "edit users", "edit permissions"
    // ]);

    // $admin = Role::create(["name" => "admin", "color" => "danger"]);
    // $admin->givePermissionTo([
    //     "basic", "get roles", "get users", "edit roles", 
    //     "edit publications", "edit users", "delete users", "delete publications", "delete roles", "delete permissions",
    //     "create roles", "create permissions"
    // ]);

    // $super_admin = Role::create(["name" => "super admin", "color" => "warning"]);
    // $super_admin->givePermissionTo("super admin");

    // $owner = Role::create(["name" => "owner", "color" => "primary"]);
    // $owner->givePermissionTo("owner");

    // $a = User::where('id', 10303)->first();
    // $a->assignRole("admin");
    // $a->assignRole("owner");
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

    // Users
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'getUsers']);
    Route::post('/users/delete', [App\Http\Controllers\AdminController::class, 'deleteUser']);

    // Roles
    Route::resource('/roles', App\Http\Controllers\RoleController::class);

    // Statistics
    Route::get('/userStats', [App\Http\Controllers\AdminController::class, 'getUserStats']);
    Route::get('/publicationStats', [App\Http\Controllers\AdminController::class, 'getPublicationStats']);
});

// Google
Route::group(["prefix" => "/auth"], function(){
    Route::get('google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
    Route::get('google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
    
    // Facebook
    Route::get('facebook', [App\Http\Controllers\FacebookController::class, 'redirectToFacebook']);
    Route::get('facebook/callback', [App\Http\Controllers\FacebookController::class, 'handleFacebookCallback']);
    
    // Github
    Route::get('github', [App\Http\Controllers\GithubController::class, 'redirectToGithub']);
    Route::get('github/callback', [App\Http\Controllers\GithubController::class, 'handleGithubCallback']);
});