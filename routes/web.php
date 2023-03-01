<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All blogs view
Route::get('/', [BlogController::class, 'index']);

// Create blog view
Route::get('/blogs/create', [BlogController::class, 'create'])->middleware('auth'); 

// Single blog view
Route::get('/blogs/{blog}', [BlogController::class, 'show']);

// Create new blog
Route::post('/blogs', [BlogController::class, 'store'])->middleware('auth'); 


// Show login form view
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Show register form view
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Create log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


