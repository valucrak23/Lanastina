<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar los patrones de crochet
 * 
 * @package App\Http\Controllers
 */
class PatternController extends Controller
{
    /**
     * Muestra la página principal con el catálogo de patrones
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $patterns = Pattern::all();
        
        return view('home', [
            'patterns' => $patterns 
        ]);
    }

    /**
     * Muestra la vista del carrito de compras
     *
     * @return \Illuminate\View\View
     */
    public function cart()
    {
        return view('cart.index');
    }
}

