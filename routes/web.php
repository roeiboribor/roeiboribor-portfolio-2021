<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Setting\ProfileController;
use App\Http\Controllers\Setting\UserController;
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
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::resource('projects', ProjectController::class)->parameters([
        'projects' => 'slug',
    ]);

    Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
});

require __DIR__ . '/auth.php';
