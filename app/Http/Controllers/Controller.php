<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\Middleware;

/**
 * Controlador base para todos los controladores de la aplicación
 * Define el método middleware() para Laravel 11
 * Los controladores hijos pueden sobrescribir este método para aplicar middleware
 */
abstract class Controller
{
    /**
     * Retorna el middleware que debe aplicarse al controlador
     * Por defecto retorna array vacío, los controladores hijos lo sobrescriben
     *
     * @return array
     */
    public static function middleware()
    {
        return [];
    }
}
