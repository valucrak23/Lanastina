<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar los patrones de crochet
 * Maneja el catálogo público y el carrito de compras (sesión)
 * 
 * @package App\Http\Controllers
 */
class PatternController extends Controller
{
    /**
     * Muestra la página principal con el catálogo de patrones
     * Retorna todos los patrones disponibles para mostrar en la home
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
     * Agrega un patrón al carrito de compras
     * Almacena el patrón en la sesión del usuario
     * Soporta respuesta JSON para AJAX y redirección tradicional
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request, $id)
    {
        $pattern = Pattern::findOrFail($id);
        
        $cart = session()->get('cart', []);
        
        // Si el producto ya está en el carrito, no lo agregamos de nuevo
        if (isset($cart[$id])) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya está en tu carrito'
                ]);
            }
            return redirect()->back()
                ->with('info', 'Ya está en tu carrito');
        }
        
        $cart[$id] = [
            'id' => $pattern->pattern_id,
            'name' => $pattern->name,
            'description' => $pattern->description,
            'price' => $pattern->price,
            'image' => $pattern->image,
            'difficulty' => $pattern->difficulty,
            'category' => $pattern->category,
        ];
        
        session()->put('cart', $cart);
        
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => '¡Agregado al carrito!',
                'cart_count' => count($cart)
            ]);
        }
        
        return redirect()->back()
            ->with('success', '¡Agregado al carrito!');
    }

    /**
     * Elimina un patrón específico del carrito
     * Remueve el item de la sesión y recalcula el total
     * Soporta respuesta JSON para AJAX
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            
            if ($request->expectsJson()) {
                $total = array_sum(array_column($cart, 'price'));
                return response()->json([
                    'success' => true,
                    'message' => 'Eliminado del carrito',
                    'cart_count' => count($cart),
                    'total' => $total
                ]);
            }
            
            return redirect()->route('cart')
                ->with('success', 'Eliminado del carrito');
        }
        
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró en el carrito'
            ]);
        }
        
        return redirect()->route('cart')
            ->with('error', 'No se encontró en el carrito');
    }

    /**
     * Vacía completamente el carrito de compras
     * Elimina toda la información del carrito de la sesión
     * Soporta respuesta JSON para AJAX
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function clearCart(Request $request)
    {
        session()->forget('cart');
        
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Carrito vaciado',
                'cart_count' => 0,
                'total' => 0
            ]);
        }
        
        return redirect()->route('cart')
            ->with('success', 'Carrito vaciado');
    }

    /**
     * Muestra la vista del carrito de compras
     * Obtiene los items de la sesión y calcula el total
     *
     * @return \Illuminate\View\View
     */
    public function cart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        // Calcula el total sumando los precios de todos los items
        foreach ($cart as $item) {
            $total += $item['price'];
        }
        
        return view('cart.index', [
            'cart' => $cart,
            'total' => $total,
        ]);
    }
}

