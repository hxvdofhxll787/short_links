<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LinkController::class, 'create'])->name('home');
Route::post('/links', [LinkController::class, 'store'])->name('links.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
