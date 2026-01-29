<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');


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

    Route::get('/actors/{actor}/delete', [ActorController::class, 'delete'])
        ->name('actors.delete');

    // CRUD Directores
    Route::resource('directors', DirectorController::class);

    // CRUD Películas
    Route::resource('movies', MovieController::class);

    Route::get('/movies/{movie}/delete', [MovieController::class, 'delete'])
        ->name('movies.delete');
});

require __DIR__.'/auth.php';
