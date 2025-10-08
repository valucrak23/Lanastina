<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // muestra posts del blog ordenados por fecha
    public function index()
    {
        $posts = BlogPost::orderBy('published_at', 'desc')->get();
        
        return view('blog.index', [
            'posts' => $posts
        ]);
    }
}

