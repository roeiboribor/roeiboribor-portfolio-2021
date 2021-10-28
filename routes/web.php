<?php

use App\Http\Controllers\PageController;
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
    Route::group(['prefix' => 'super', 'middleware' => ['super']], function () {
        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'slug',
        ]);
    });

    Route::group(['prefix' => 'manager'], function () {
        Route::get('/dashboard', function () {
            return "Manager";
        });
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/dashboard', 'PageController@dashboard');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/dashboard', function () {
            return "Customer";
        });
    });

    Route::get('/settings/password/create', [PasswordController::class, 'create'])->name('settings.password.create');
    Route::post('/settings/password/', [PasswordController::class, 'store'])->name('settings.password.store');
});

require __DIR__ . '/auth.php';
