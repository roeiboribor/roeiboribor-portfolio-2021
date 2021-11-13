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

    // ----- ROLE: Super ------ //
    Route::group(['middleware' => 'role:super'], function () {
        Route::group(['prefix' => 'super'], function () {
            Route::resource('projects', ProjectController::class)->parameters([
                'projects' => 'slug',
            ]);
        });
    });

    // ------- SETTINGS ------ //
    Route::get('/settings/password/create', [PasswordController::class, 'create'])->name('settings.password.create');
    Route::post('/settings/password/', [PasswordController::class, 'store'])->name('settings.password.store');
});

require __DIR__ . '/auth.php';
