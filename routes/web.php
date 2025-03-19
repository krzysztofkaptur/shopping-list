<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->controller(AuthController::class)->group(function () {
  Route::get('/login', 'showLogin')->name('login.show');
  Route::post('/login', 'login')->name('login');
  Route::get('/register', 'showRegister')->name('register.show');
  Route::post('/register', 'register')->name('register');
  Route::get('/auth/github', 'loginGithub')->name('auth.github');
  Route::get('/auth/github/callback', 'loginGithubCallback')->name('auth.github-callback');
});

Route::middleware('auth')->controller(AuthController::class)->group(function () {
  Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->controller(CategoryController::class)->prefix('/categories')->group(function () {
  Route::get('/', 'index')->name('categories.index');
  Route::get('/create', 'create')->name('categories.create');
  Route::post('/create', 'store')->name('categories.store');
  Route::get('/{id}', 'show')->name('categories.show');
  Route::delete('/{category}', 'destroy')->name('categories.destroy');
  Route::patch('/{category}', 'update')->name('categories.update');
});

Route::middleware('auth')->controller(ProfileController::class)->prefix('/profile')->group(function () {
  Route::get('/', 'index')->name('profile.index');
});

Route::middleware('auth')->controller(ItemController::class)->group(function () {
  Route::get('/', 'index')->name('items.index');
  Route::get('/create', 'create')->name('items.create');
  Route::post('/create', 'store')->name('items.store');
  Route::get('/{id}', 'show')->name('items.show');
  Route::delete('/{item}', 'destroy')->name('items.destroy');
  Route::patch('/{item}', 'update')->name('items.update');
});

