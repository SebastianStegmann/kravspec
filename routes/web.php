<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecController;
use App\Http\Controllers\SpecRowController;

Route::middleware('auth')->group(function () {
    Route::get('/specs', [SpecController::class, 'index'])->name('specs.index');
    Route::get('/specs/create/{spec_id}', [SpecController::class, 'create'])->name('specs.create');
    Route::get('/specs/{id}', [SpecRowController::class, 'view'])->name('specs.view');
    Route::post('/spec-rows', [SpecRowController::class, 'store'])->name('specs.store_rows');
    // Route::put('/spec-rows', [SpecRowController::class, 'edit'])->name('specs.edit_rows');
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
