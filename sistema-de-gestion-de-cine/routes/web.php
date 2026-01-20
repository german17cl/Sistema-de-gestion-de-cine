<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // CRUD Actores
    Route::resource('actors', ActorController::class);

    // CRUD Directores
    Route::resource('directors', DirectorController::class);

    // CRUD Películas
    Route::resource('movies', MovieController::class);
});

require __DIR__.'/auth.php';
