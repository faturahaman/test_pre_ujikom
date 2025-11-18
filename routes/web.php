<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RentController;
// use App\Http\Controllers\PublicCameraController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/article', [ArticleController::class, 'index'])->name('article');
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store'); 

Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/rent', [RentController::class, 'store'])->name('rent.store'); 