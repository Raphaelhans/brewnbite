<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::redirect('/', '/login');

Route::get('/login', [AdminController::class, 'login'])->name('login');
// Route User

// Route Karyawan

// Route Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/inventory', [AdminController::class, 'inventory'])->name('inventory');
    Route::get('/ratings', [AdminController::class, 'ratings'])->name('ratings');
    Route::get('/sales', [AdminController::class, 'sales'])->name('sales');
    Route::get('/bestsellers', [AdminController::class, 'bestsellers'])->name('bestsellers');
});
