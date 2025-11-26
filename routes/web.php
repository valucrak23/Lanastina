<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBlogController;

// Página principal - Tienda de patrones
Route::get('/', [PatternController::class, 'index'])
    ->name('home');

// Blog / Noticias
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog');

// Carrito de compras (vista básica)
Route::get('/carrito', [PatternController::class, 'cart'])
    ->name('cart');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Rutas del panel de administración
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');
    
    Route::get('/users', [AdminController::class, 'users'])
        ->name('users');
    
    Route::get('/users/{id}', [AdminController::class, 'showUser'])
        ->name('users.show');
    
    // ABM de blog posts
    Route::resource('blog', AdminBlogController::class);
});
