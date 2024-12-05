<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecController;
use App\Http\Controllers\SpecRowController;

Route::middleware('auth')->group(function () {
    Route::get('/specs', [SpecController::class, 'index'])->name('specs.index');
    Route::get('/specs/{id}', [SpecController::class, 'view'])->name('specs.view');
    // Route::get('/spec-rows/create/{spec_id}', [SpecController::class, 'create'])->name('specs-rows.create');
    Route::get('/spec-rows/{id}/{time?}', [SpecRowController::class, 'view'])->name('specs-rows.index');
    Route::post('/spec-rows', [SpecRowController::class, 'store'])->name('specs-rows.store_rows');
    Route::get('/suggestions/{id}', [SpecRowController::class, 'suggestions'])->name('specs.suggestions');
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
