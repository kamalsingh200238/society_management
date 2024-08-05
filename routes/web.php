<?php

use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::middleware(['auth', 'role:society coordinator'])->prefix('/coordinator')->name('coordinator.')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Student');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:student,society president'])->prefix('/student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Student');
    })->name('dashboard');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
