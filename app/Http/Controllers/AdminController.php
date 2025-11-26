<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\Pattern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para el panel de administración
 * Dashboard con estadísticas y gestión de usuarios
 * 
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Middleware de autenticación y autorización admin
     *
     * @return array
     */
    public static function middleware()
    {
        return [
            'admin',
        ];
    }

    /**
     * Muestra el dashboard del administrador
     * Estadísticas: conteo de usuarios, posts y patrones
     * Lista los 5 posts y usuarios más recientes
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $usersCount = User::count();
        $postsCount = BlogPost::count();
        $patternsCount = Pattern::count();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->take(5)->get();
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'patternsCount' => $patternsCount,
            'recentPosts' => $recentPosts,
            'recentUsers' => $recentUsers,
        ]);
    }

    /**
     * Muestra el listado de usuarios con paginación
     * Ordenados por fecha de creación descendente
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Muestra el detalle de un usuario específico
     * Incluye los posts del blog creados por ese usuario
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $posts = BlogPost::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('admin.users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}

