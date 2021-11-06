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
    Route::group(['prefix' => 'super', 'middleware' => ['role:super']], function () {
        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'slug',
        ]);
    });

    Route::group(['prefix' => 'manager', 'middleware' => ['role:manager']], function () {
        Route::view('/dashboard', 'manager.dashboard')->name('manager.dashboard');
    });

    Route::group(['prefix' => 'supplier', 'middleware' => ['role:supplier']], function () {
        Route::view('/dashboard', 'supplier.dashboard')->name('supplier.dashboard');
    });

    Route::group(['prefix' => 'customer', 'middleware' => ['role:customer']], function () {
        Route::view('/dashboard', 'customer.dashboard')->name('customer.dashboard');
    });

    Route::resource('products', ProductController::class)->parameters([
        'products' => 'slug',
    ])->middleware('role:super,supplier');

    Route::get('/settings/password/create', [PasswordController::class, 'create'])->name('settings.password.create');
    Route::post('/settings/password/', [PasswordController::class, 'store'])->name('settings.password.store');
});

require __DIR__ . '/auth.php';
