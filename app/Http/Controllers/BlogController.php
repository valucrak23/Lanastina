<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

/**
 * Controlador para mostrar el blog público
 * 
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * Muestra todos los posts del blog ordenados por fecha de publicación
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = BlogPost::with('user')->orderBy('published_at', 'desc')->get();
        
        return view('blog.index', [
            'posts' => $posts
        ]);
    }
}

