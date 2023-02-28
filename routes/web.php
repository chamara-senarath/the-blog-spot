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

// All blogs
Route::get('/', [BlogController::class, 'index']);

// Single blog
Route::get('/blogs/{blog}', [BlogController::class, 'show']);

// Show login form
Route::get('/login', [UserController::class, 'login']);

// Show register form
Route::get('/register', [UserController::class, 'create']);

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Create log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


