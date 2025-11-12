<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicCameraController;

// Rute Publik (Guest)
Route::get('/', [PublicCameraController::class, 'index'])->name('home');
Route::get('/kamera/{camera:slug}', [PublicCameraController::class, 'show'])->name('cameras.show');