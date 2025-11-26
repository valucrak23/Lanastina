<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para el ABM de blog posts en el panel de administración
 * 
 * @package App\Http\Controllers
 */
class AdminBlogController extends Controller
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
     * Muestra el listado de posts del blog
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = BlogPost::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.blog.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Muestra el detalle de un post específico
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = BlogPost::with('user')->findOrFail($id);

        return view('admin.blog.show', [
            'post' => $post,
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo post
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Almacena un nuevo post en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'subtitle' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 200 caracteres.',
            'subtitle.required' => 'El subtítulo es obligatorio.',
            'subtitle.max' => 'El subtítulo no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'category.required' => 'La categoría es obligatoria.',
            'category.max' => 'La categoría no puede tener más de 100 caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no puede pesar más de 2MB.',
            'published_at.date' => 'La fecha de publicación debe ser una fecha válida.',
        ]);

        // Manejo de la imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Asignar el usuario autenticado como autor
        $validated['user_id'] = auth()->id();
        $validated['author'] = auth()->user()->name;

        // Si no se proporciona fecha de publicación, usar la actual
        if (!isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Post creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un post
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);

        return view('admin.blog.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Actualiza un post en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'subtitle' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 200 caracteres.',
            'subtitle.required' => 'El subtítulo es obligatorio.',
            'subtitle.max' => 'El subtítulo no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'category.required' => 'La categoría es obligatoria.',
            'category.max' => 'La categoría no puede tener más de 100 caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no puede pesar más de 2MB.',
            'published_at.date' => 'La fecha de publicación debe ser una fecha válida.',
        ]);

        // Manejo de la imagen
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $validated['image'] = $imagePath;
        }

        $post->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Post actualizado exitosamente.');
    }

    /**
     * Elimina un post de la base de datos
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        // Eliminar imagen si existe
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Post eliminado exitosamente.');
    }
}

