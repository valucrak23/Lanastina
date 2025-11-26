<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\Middleware;

abstract class Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware|\Closure|string>
     */
    public static function middleware()
    {
        return [];
    }
}
