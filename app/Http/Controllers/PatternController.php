<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    /**
     * Muestra la página principal con los patrones disponibles
     */
    public function index()
    {
        $patterns = Pattern::all();
        
        return view('home', [
            'patterns' => $patterns
        ]);
    }

    /**
     * Muestra el carrito de compras (vista básica)
     */
    public function cart()
    {
        return view('cart');
    }
}

