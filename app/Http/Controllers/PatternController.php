<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    // trae todos los patrones para la home
    public function index()
    {
        $patterns = Pattern::all();
        
        return view('home', [
            'patterns' => $patterns 
        ]);
    }

    // carrito basico, solo la vista
    public function cart()
    {
        return view('cart.index');
    }
}

