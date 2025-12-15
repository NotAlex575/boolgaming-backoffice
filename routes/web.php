<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideogameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chi_sono', function () {
    return view('chi_sono');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('videogames', VideogameController::class);
});

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});

require __DIR__.'/auth.php';
