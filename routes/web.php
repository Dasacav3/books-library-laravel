<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', [HomeController::class, 'main']);

Route::get('/home', [HomeController::class, 'dashboard']);

// Books

Route::get('/books', [BookController::class, 'index']);

Route::post('/books/create', [BookController::class, 'create']);

Route::get('/books/{book}', [BookController::class, 'edit']);

Route::post('/books/{book}/edit', [BookController::class, 'update']);

Route::get('/books/{book}/delete', [BookController::class, 'delete']);

// Login & Register

Route::get('/login', [HomeController::class, 'loginindex']);

Route::post('/loginuser', [HomeController::class, 'login']);

Route::get('/register', [HomeController::class, 'register']);

Route::post('/registeruser', [HomeController::class, 'createUser']);

Route::get('/logout', [HomeController::class, 'logout']);

// Profile

Route::get('/profile', [ProfileController::class, 'index']);

Route::post('/profile/update', [ProfileController::class, 'update']);

// Authors

Route::get('/authors', [AuthorController::class, 'index']);

Route::post('/authors/create', [AuthorController::class, 'create']);

Route::get('/authors/{author}', [AuthorController::class, 'edit']);

Route::put('/authors/{author}/edit', [AuthorController::class, 'update']);

Route::get('/authors/{author}/delete', [AuthorController::class, 'delete']);

// Topics

Route::get('/topics', [TopicController::class, 'index']);

Route::post('/topics/create', [TopicController::class, 'create']);

Route::get('/topics/{author}', [TopicController::class, 'edit']);

Route::put('/topics/{author}/edit', [TopicController::class, 'update']);

Route::get('/topics/{author}/delete', [TopicController::class, 'delete']);

