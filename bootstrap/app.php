<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/**
 * Configuración de la aplicación Laravel
 * Registra rutas, middleware y manejo de excepciones
 */
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // Rutas web
        health: '/up', // Endpoint de salud
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Registra el alias 'admin' para el middleware IsAdmin
        // Permite usar 'admin' en lugar de la clase completa en las rutas
        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
