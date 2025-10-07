<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\BlogController;

// Página principal - Tienda de patrones
Route::get('/', [PatternController::class, 'index'])
    ->name('home');

// Blog / Noticias
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog');

// Carrito de compras (vista básica)
Route::get('/carrito', [PatternController::class, 'cart'])
    ->name('cart');
