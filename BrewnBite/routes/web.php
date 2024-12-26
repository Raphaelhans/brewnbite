<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\CheckUserRole;

Route::redirect('/', '/login');

// Route Auth
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('/logout',[AuthController::class, 'logout']);

// Route User
Route::prefix('home')->name('home.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});

// Route Karyawan
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    Route::get('/history', [EmployeeController::class, 'history'])->name('history');
    Route::get('/inventory', [EmployeeController::class, 'inventory'])->name('inventory');
    Route::get('/listmenu', [EmployeeController::class, 'listmenu'])->name('listmenu');
});

// Route Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/inventory', [AdminController::class, 'inventory'])->name('inventory');
    Route::get('/ratings', [AdminController::class, 'ratings'])->name('ratings');
    Route::get('/sales', [AdminController::class, 'sales'])->name('sales');
    Route::get('/bestsellers', [AdminController::class, 'bestsellers'])->name('bestsellers');
});