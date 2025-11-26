<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminPatternController;

// ========== RUTAS PÚBLICAS ==========

// Página principal - Catálogo de patrones
Route::get('/', [PatternController::class, 'index'])
    ->name('home');

// Blog público - Lista de posts
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog');

// Carrito de compras - Gestión mediante sesión
Route::get('/carrito', [PatternController::class, 'cart'])
    ->name('cart');

Route::post('/carrito/agregar/{id}', [PatternController::class, 'addToCart'])
    ->name('cart.add');

Route::delete('/carrito/eliminar/{id}', [PatternController::class, 'removeFromCart'])
    ->name('cart.remove');

Route::post('/carrito/vaciar', [PatternController::class, 'clearCart'])
    ->name('cart.clear');

// ========== RUTAS DE AUTENTICACIÓN ==========

// Login - Solo para usuarios no autenticados (guest)
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

// Registro - Solo para usuarios no autenticados (guest)
Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');

// Logout - Solo para usuarios autenticados (auth)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ========== RUTAS DEL PANEL DE ADMINISTRACIÓN ==========
// Protegidas por middleware auth y admin

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard con estadísticas
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');
    
    // Gestión de usuarios
    Route::get('/users', [AdminController::class, 'users'])
        ->name('users');
    
    Route::get('/users/{id}', [AdminController::class, 'showUser'])
        ->name('users.show');
    
    // ABM completo de blog posts (CRUD)
    Route::resource('blog', AdminBlogController::class);
    
    // ABM completo de patrones (CRUD)
    Route::resource('patterns', AdminPatternController::class);
});
