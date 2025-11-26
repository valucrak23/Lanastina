<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware para verificar que el usuario autenticado sea administrador
 * Protege las rutas del panel de administración
 * 
 * @package App\Http\Middleware
 */
class IsAdmin
{
    /**
     * Procesa la petición y verifica permisos de administrador
     * Si no está autenticado, redirige a login
     * Si no es admin, redirige a home con error
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica autenticación
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta sección.');
        }

        // Verifica rol de administrador
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}

