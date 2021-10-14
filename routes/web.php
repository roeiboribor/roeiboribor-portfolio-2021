<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/test', [PageController::class, 'test'])->name('test');
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    
    Route::resource('projects', ProjectController::class)->parameters([
        'projects' => 'slug',
    ]);

    Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');
});

require __DIR__.'/auth.php';
