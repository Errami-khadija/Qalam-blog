<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned
| to the "web" middleware group.
|--------------------------------------------------------------------------
*/

// --------------------
// Public Routes
// --------------------
Route::get('/', [PostController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);

// --------------------
// Authenticated User Routes
// --------------------
Route::middleware('auth')->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --------------------
// Admin Dashboard Routes
// --------------------
Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'verified']) 
    ->group(function () {
        Route::get('/', [AdminPostController::class, 'dashboard'])->name('home');
        Route::resource('posts', AdminPostController::class);
    });

// --------------------
// Authentication Routes
// --------------------
require __DIR__ . '/auth.php';
