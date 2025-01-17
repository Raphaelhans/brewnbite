<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\CheckAdminRole;
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
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/news', [NewsController::class, 'news'])->name('news');
    Route::get('/detailNews/{id}', [NewsController::class, 'detailNews'])->name('detail.news');
    Route::get('/profile', [UserController::class, 'displayProfile'])->name('profile');
    Route::get('/topup', [UserController::class, 'displayTopUp'])->name('topup');
    Route::prefix('/menu')->name('menu.')->group(function () {
        Route::get('/', [UserController::class, 'menu'])->name('index');
        Route::get('/detail', [UserController::class, 'detailMenu'])->name('detail');
    });
    Route::prefix('/cart')->name('cart.')->group(function () {
        Route::get('/', [UserController::class, 'cart'])->name('index');
        Route::get('/summary', [UserController::class, 'summary'])->name('summary');
        Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
    });
    Route::prefix('/history')->name('history.')->group(function () {
        Route::get('/', [UserController::class, 'history'])->name('index');
        Route::get('/detail', [UserController::class, 'detailHistory'])->name('detail');
        Route::get('/rating', [UserController::class, 'rating'])->name('rating');
    });
    Route::prefix('/promo')->name('promo.')->group(function () {
        Route::get('/', [UserController::class, 'promo'])->name('index');
        Route::get('/redeem', [UserController::class, 'redeemPromo'])->name('reedem');
    });
});
Route::post('/profile', [UserController::class, 'editProfile'])->name('user.update');


// Route Karyawan
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    Route::get('/history', [EmployeeController::class, 'history'])->name('history');
    Route::get('/inventory', [EmployeeController::class, 'inventory'])->name('inventory');
    Route::get('/listmenu', [EmployeeController::class, 'listmenu'])->name('listmenu');
    Route::get('/editmenu/{id}', [EmployeeController::class, 'toeditMenu'])->name('editmenu');
    Route::post('/menu/insert', [EmployeeController::class, 'addmenu']);
    Route::post('/menu/deletemenu', [EmployeeController::class, 'deletemenu']);
    Route::post('/menu/insertrecipe', [EmployeeController::class, 'addrecipe']);
    Route::post('/menu/editmenu', [EmployeeController::class, 'editmenu']);
    Route::post('/menu/editrecipe', [EmployeeController::class, 'editrecipe']);
    Route::post('/ingredient/insert', [EmployeeController::class, 'insertIngredient']);
    Route::post('/ingredient/update', [EmployeeController::class, 'updateIngredient']);
    Route::post('/ingredient/delete', [EmployeeController::class, 'deleteIngredient']);
});
Route::get('/get-category/{id}', [EmployeeController::class, 'getCategory']);
Route::get('/get-unit/{id}', [EmployeeController::class, 'getUnit']);

Route::prefix('menu')->group(function () {
    Route::post('/insert', [EmployeeController::class, 'menu']);
});

// Route Admin
Route::prefix('admin')->middleware('checkAdmin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/inventory', [AdminController::class, 'inventory'])->name('inventory');
    Route::get('/ratings', [AdminController::class, 'ratings'])->name('ratings');
    Route::get('/sales', [AdminController::class, 'sales'])->name('sales');
    Route::get('/topspenders', [AdminController::class, 'topspenders'])->name('topspenders');
    Route::get('/bestsellers', [AdminController::class, 'bestsellers'])->name('bestsellers');
    Route::prefix('/production')->name('production.')->group(function () {
        Route::get('/{id}', [AdminController::class, 'production'])->name('production');
        Route::post('/update', [AdminController::class, 'updateProduction'])->name('update');
    });
    Route::prefix('restock')->name('restock.')->group(function () {
        Route::get('/{id}', [AdminController::class, 'restock'])->name('restock');
        Route::post('/update', [AdminController::class, 'updateRestock'])->name('update');
    });
    Route::prefix('master')->name('master.')->group(function () {
        Route::prefix('/addons')->name('addons.')->group(function () {
            Route::get('/', [AdminController::class, 'addons'])->name('addons');
            Route::get('/add', [AdminController::class, 'addAddon'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddAddon'])->name('doadd');
            Route::get('/edit/{id}', [AdminController::class, 'editAddon'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditAddon'])->name('doedit');
            Route::post('/activate', [AdminController::class, 'activateAddon'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateAddon'])->name('deactivate');
        });
        Route::prefix('/categories')->name('categories.')->group(function () {
            Route::get('/', [AdminController::class, 'categories'])->name('categories');
            Route::get('/add', [AdminController::class, 'addCategory'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddCategory'])->name('doadd');
            Route::get('/edit/{id}', [AdminController::class, 'editCategory'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditCategory'])->name('doedit');
            Route::post('/activate', [AdminController::class, 'activateCategory'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateCategory'])->name('deactivate');
        });
        Route::prefix('/products')->name('products.')->group(function () {
            Route::get('/', [AdminController::class, 'products'])->name('products');
            Route::get('/add', [AdminController::class, 'addProduct'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddProduct'])->name('doadd');
            Route::get('/edit/{id}', [AdminController::class, 'editProduct'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditProduct'])->name('doedit');
            Route::post('/activate', [AdminController::class, 'activateProduct'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateProduct'])->name('deactivate');
        });
        Route::prefix('/promos')->name('promos.')->group(function () {
            Route::get('/', [AdminController::class, 'promos'])->name('promos');
            Route::get('/add', [AdminController::class, 'addPromo'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddPromo'])->name('doadd');
            Route::get('/edit/{id}', [AdminController::class, 'editPromo'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditPromo'])->name('doedit');
            Route::post('/activate', [AdminController::class, 'activatePromo'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivatePromo'])->name('deactivate');
        });
        Route::prefix('/subcategories')->name('subcategories.')->group(function () {
            Route::get('/', [AdminController::class, 'subcategories'])->name('subcategories');
            Route::get('/add', [AdminController::class, 'addSubcategory'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddSubcategory'])->name('doadd');
            Route::get('/edit/{id}', [AdminController::class, 'editSubcategory'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditSubcategory'])->name('doedit');
            Route::post('/activate', [AdminController::class, 'activateSubcategory'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateSubcategory'])->name('deactivate');
        });
        Route::prefix('/ingredients')->name('ingredients.')->group(function () {
            Route::get('/', [AdminController::class, 'ingredients'])->name('ingredients');
            Route::get('/add', [AdminController::class, 'addIngredient'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddIngredient'])->name('doadd');
            Route::get('/edit/{id}', [AdminController::class, 'editIngredient'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditIngredient'])->name('doedit');
            Route::post('/activate', [AdminController::class, 'activateIngredient'])->name('activate');
            Route::post('/deactivate', [AdminController::class, 'deactivateIngredient'])->name('deactivate');
        });
        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', [AdminController::class, 'users'])->name('users');
            Route::post('/activate', [AdminController::class, 'activateUser'])->name('activate');
            Route::post('/suspend', [AdminController::class, 'suspendUser'])->name('suspend');
            Route::get('/edit/{id}', [AdminController::class, 'editUser'])->name('edit');
            Route::post('/edit', [AdminController::class, 'doEditUser'])->name('doedit');
            Route::get('/add', [AdminController::class, 'addEmployee'])->name('add');
            Route::post('/add', [AdminController::class, 'doAddEmployee'])->name('doadd');
        });
    });
});
// AJAX Admin
Route::get('/get-subcategories/{categoryId}', [AdminController::class, 'getSubcategories']);