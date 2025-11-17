<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\ProductController;

// use App\Http\Controllers\PublicCameraController;

Route::get('/', [PageController::class, 'index'])->name('home');



Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store'); 

