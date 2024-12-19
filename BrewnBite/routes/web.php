<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
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

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/news', [NewsController::class, 'news'])->name('news');
    Route::get('/detailNews', [NewsController::class, 'detailNews'])->name('detail.news');
    Route::get('/profile', [UserController::class, 'displayProfile'])->name('profile');
    Route::get('/topup', [UserController::class, 'displayTopUp'])->name('topup');
});