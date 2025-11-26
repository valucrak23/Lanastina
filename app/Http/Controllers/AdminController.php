<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para el panel de administración
 * 
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware|\Closure|string>
     */
    public static function middleware()
    {
        return [
            'admin',
        ];
    }

    /**
     * Muestra el dashboard del administrador
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $usersCount = User::count();
        $postsCount = BlogPost::count();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->take(5)->get();
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'recentPosts' => $recentPosts,
            'recentUsers' => $recentUsers,
        ]);
    }

    /**
     * Muestra el listado de usuarios
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
     * Muestra el detalle de un usuario
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

