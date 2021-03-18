<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Models\Avatar;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
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
    $avatars = Avatar::all();
    $users = User::all();
    $categories = Category::all();
    return view('welcome', compact('avatars', 'users', 'categories'));
});

Route::get('/downloadIMG/{id}', [ImageController::class, 'downloadIMG']);

Route::resource('avatars',AvatarController::class);
Route::resource('users',UserController::class);
Route::resource('images',ImageController::class);
Route::resource('categories',CategoryController::class);

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
