<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 * Route de l'application en général
 */
Route::get('/', [PagesController::class, 'index']);

Route::get('/contact-us', [PagesController::class, 'contact']);

Route::get('/about', [PagesController::class, 'about']);

/**
 * Route des articles
 */

Route::get('/articles', [ArticlesController::class, 'index']);

Route::get('/articles/create', [ArticlesController::class,'create']);

Route::post('/articles/create', [ArticlesController::class,'store'])->name('article.store');

Route::get('/article/{id}', [ArticlesController::class,'show']);

Route::get('article/{article}/edit', [ArticlesController::class, 'edit']);

Route::put('/article/{article}/edit', [ArticlesController::class, 'update']);

Route::delete('article/{article}/delete', [ArticlesController::class, 'delete']);

/**
 * Route d'authentification
 */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register-create');
Route::get('/login', [SessionsController::class, 'index'])->name('login');
Route::post('/login', [SessionsController::class, 'authenticate'])->name('login-auth');
Route::post('/logout', [SessionsController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'index'])->name('profile');
