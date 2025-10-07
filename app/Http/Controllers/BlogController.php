<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Muestra todas las entradas del blog
     */
    public function index()
    {
        $posts = BlogPost::orderBy('published_at', 'desc')->get();
        
        return view('blog', [
            'posts' => $posts
        ]);
    }
}

