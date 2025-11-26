<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador para el ABM de patrones en el panel de administración
 * CRUD completo: crear, leer, actualizar y eliminar patrones
 * Incluye validación y manejo de imágenes
 * 
 * @package App\Http\Controllers
 */
class AdminPatternController extends Controller
{
    /**
     * Middleware de autenticación y autorización admin
     * Protege todas las rutas del controlador
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
     * Lista todos los patrones con paginación
     * Ordenados por fecha de creación descendente
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $patterns = Pattern::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.patterns.index', [
            'patterns' => $patterns,
        ]);
    }

    /**
     * Muestra el detalle de un patrón específico
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pattern = Pattern::findOrFail($id);

        return view('admin.patterns.show', [
            'pattern' => $pattern,
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo patrón
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.patterns.create');
    }

    /**
     * Almacena un nuevo patrón en la base de datos
     * Valida los datos, procesa la imagen si existe y crea el registro
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'difficulty' => ['required', 'in:Principiante,Intermedio,Avanzado'],
            'category' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 150 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio no puede ser negativo.',
            'difficulty.required' => 'La dificultad es obligatoria.',
            'difficulty.in' => 'La dificultad debe ser: Principiante, Intermedio o Avanzado.',
            'category.required' => 'La categoría es obligatoria.',
            'category.max' => 'La categoría no puede tener más de 100 caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no puede pesar más de 2MB.',
        ]);

        // Procesa y almacena la imagen en storage/app/public/pattern_images
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pattern_images', 'public');
            $validated['image'] = $imagePath;
        }

        Pattern::create($validated);

        return redirect()->route('admin.patterns.index')
            ->with('success', 'Patrón creado');
    }

    /**
     * Muestra el formulario para editar un patrón existente
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pattern = Pattern::findOrFail($id);

        return view('admin.patterns.edit', [
            'pattern' => $pattern,
        ]);
    }

    /**
     * Actualiza un patrón en la base de datos
     * Valida los datos, reemplaza la imagen si se sube una nueva
     * y elimina la imagen anterior del storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $pattern = Pattern::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'difficulty' => ['required', 'in:Principiante,Intermedio,Avanzado'],
            'category' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 150 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio no puede ser negativo.',
            'difficulty.required' => 'La dificultad es obligatoria.',
            'difficulty.in' => 'La dificultad debe ser: Principiante, Intermedio o Avanzado.',
            'category.required' => 'La categoría es obligatoria.',
            'category.max' => 'La categoría no puede tener más de 100 caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no puede pesar más de 2MB.',
        ]);

        // Procesa nueva imagen: elimina la anterior y guarda la nueva
        if ($request->hasFile('image')) {
            if ($pattern->image && Storage::disk('public')->exists($pattern->image)) {
                Storage::disk('public')->delete($pattern->image);
            }
            
            $imagePath = $request->file('image')->store('pattern_images', 'public');
            $validated['image'] = $imagePath;
        }

        $pattern->update($validated);

        return redirect()->route('admin.patterns.index')
            ->with('success', 'Patrón actualizado');
    }

    /**
     * Elimina un patrón de la base de datos
     * Elimina también la imagen asociada del storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pattern = Pattern::findOrFail($id);

        // Elimina la imagen del storage antes de borrar el registro
        if ($pattern->image && Storage::disk('public')->exists($pattern->image)) {
            Storage::disk('public')->delete($pattern->image);
        }

        $pattern->delete();

        return redirect()->route('admin.patterns.index')
            ->with('success', 'Patrón eliminado');
    }
}

