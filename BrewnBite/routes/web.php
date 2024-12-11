<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('/logout',[AuthController::class, 'logout']);

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});