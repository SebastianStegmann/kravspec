<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecController;

Route::middleware('auth')->group(function () {
    Route::get('/specs/{id}', [SpecController::class, 'view'])->name('specs.view');
    Route::get('/specs', [SpecController::class, 'index'])->name('specs.index');
    Route::get('/specs/create', [SpecController::class, 'create'])->name('specs.create');
    Route::post('/specs', [SpecController::class, 'store'])->name('specs.store');
});

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
});

require __DIR__ . '/auth.php';
