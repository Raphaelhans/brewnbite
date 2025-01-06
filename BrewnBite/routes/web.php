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
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/menu', [UserController::class, 'menu'])->name('menu');
});

// Route Karyawan
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    Route::get('/history', [EmployeeController::class, 'history'])->name('history');
    Route::get('/inventory', [EmployeeController::class, 'inventory'])->name('inventory');
});
Route::get('/get-category/{id}', [EmployeeController::class, 'getCategory']);

Route::prefix('menu')->group(function () {
    Route::post('/insert', [EmployeeController::class, 'menu']);
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
    Route::get('/ratings', [AdminController::class, 'ratings'])->name('ratings');
    Route::get('/sales', [AdminController::class, 'sales'])->name('sales');
    Route::get('/bestsellers', [AdminController::class, 'bestsellers'])->name('bestsellers');
    Route::prefix('addemployee')->name('addemployee.')->group(function () {
        Route::get('/', [AdminController::class, 'addEmployee'])->name('add');
        Route::post('/', [AdminController::class, 'doAddEmployee'])->name('doadd');
    });
    Route::prefix('master')->name('master.')->group(function () {
        Route::prefix('/categories')->name('categories.')->group(function () {
            Route::get('/', [AdminController::class, 'categories'])->name('categories');
            Route::post('/add', [AdminController::class, 'addCategory'])->name('add');
            Route::post('/edit', [AdminController::class, 'editCategory'])->name('edit');
            Route::post('/activate', [AdminController::class, 'activateCategory'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateCategory'])->name('deactivate');
        });
        Route::prefix('/products')->name('products.')->group(function () {
            Route::get('/', [AdminController::class, 'products'])->name('products');
            Route::post('/add', [AdminController::class, 'addProduct'])->name('add');
            Route::post('/edit', [AdminController::class, 'editProduct'])->name('edit');
            Route::post('/activate', [AdminController::class, 'activateProduct'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateProduct'])->name('deactivate');
        });
        Route::prefix('/promos')->name('promos.')->group(function () {
            Route::get('/', [AdminController::class, 'promos'])->name('promos');
            Route::post('/add', [AdminController::class, 'addPromo'])->name('add');
            Route::post('/edit', [AdminController::class, 'editPromo'])->name('edit');
            Route::post('/activate', [AdminController::class, 'activatePromo'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivatePromo'])->name('deactivate');
        });
        Route::prefix('/subcategories')->name('subcategories.')->group(function () {
            Route::get('/', [AdminController::class, 'subcategories'])->name('subcategories');
            Route::post('/add', [AdminController::class, 'addSubcategory'])->name('add');
            Route::post('/edit', [AdminController::class, 'editSubcategory'])->name('edit');
            Route::post('/activate', [AdminController::class, 'activateSubcategory'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateSubcategory'])->name('deactivate');
        });
        Route::prefix('/ingredients')->name('ingredients.')->group(function () {
            Route::get('/', [AdminController::class, 'ingredients'])->name('ingredients');
            Route::post('/add', [AdminController::class, 'addIngredient'])->name('add');
            Route::post('/edit', [AdminController::class, 'editIngredient'])->name('edit');
            Route::post('/activate', [AdminController::class, 'activateIngredient'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateIngredient'])->name('deactivate');
        });
        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', [AdminController::class, 'users'])->name('users');
            Route::post('/activate', [AdminController::class, 'activateUser'])->name('activate');
            Route::post('/suspend', [AdminController::class, 'suspendUser'])->name('suspend');
            Route::get('/edit/{id}', [AdminController::class, 'editUser'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditUser'])->name('doedit');
        });
    });
});