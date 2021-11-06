<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Inventory\ProductController;
use App\Http\Controllers\Setting\PasswordController;
use App\Http\Controllers\Super\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Add Middleware role to limit the user
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/test', [PageController::class, 'test'])->name('test');

Route::middleware(['auth'])->group(function () {

    Route::view('/manager/dashboard', 'manager.dashboard')->name('manager.dashboard');
    Route::view('/supplier/dashboard', 'supplier.dashboard')->name('supplier.dashboard');
    Route::view('/customer/dashboard', 'customer.dashboard')->name('customer.dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('role:super,supplier');

    Route::group(['middleware' => 'role:super'], function () {

        Route::group(['prefix' => 'super'], function () {
            Route::resource('projects', ProjectController::class)->parameters([
                'projects' => 'slug',
            ]);
        });

        Route::get('/products/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{slug}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{slug}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::group(['middleware' => 'role:supplier'], function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    });

    Route::get('/settings/password/create', [PasswordController::class, 'create'])->name('settings.password.create');
    Route::post('/settings/password/', [PasswordController::class, 'store'])->name('settings.password.store');
});

require __DIR__ . '/auth.php';
