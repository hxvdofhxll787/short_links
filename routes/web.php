<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LinkController::class, 'create'])->name('home');
Route::post('/links', [LinkController::class, 'store'])->name('links.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [LinkController::class, 'index'])->name('dashboard');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
    Route::get('/links/{link}', [LinkController::class, 'show'])->name('links.show');
});

Route::get('/{code}', RedirectController::class)->name('redirect');

require __DIR__.'/auth.php';
