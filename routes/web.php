<?php

use App\Models\Publication;
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
    // $publications = Publication::all();

    // foreach ($publications as $publication) {
    //     echo "<h3>Publication</h3>";
    //     echo $publication->user->name . ": " . $publication->description . "<br/>";
        
    //     echo "Esta publicacion tiene: " . count($publication->likes) . " likes";

    //     echo "<h4>Comments</h4>";
    //     foreach ($publication->comments as $comments) {
    //         echo $comments->user->name . ": " .$comments->description . "<br/>";
    //     }

    //     echo "<hr/>";

    // }

    // die();
  
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
