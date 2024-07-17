<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('board', BoardController::class)
        ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy']);



    Route::resource('boards.lists', BoardListController::class)
    ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy']);
});

require __DIR__.'/auth.php';