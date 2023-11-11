<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;

Route::get('/', function () {
    return view('welcome');
});


// Route::post();
// Route::put();
// Route::delete();



Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'])
    ->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])
    ->name('chirps.store');;
    //$message = request('message');
});

require __DIR__.'/auth.php';
