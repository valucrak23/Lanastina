<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla patterns (productos de la tienda)
     * Almacena información de patrones de crochet: nombre, descripción, precio, dificultad, categoría e imagen
     */
    public function up(): void
    {
        Schema::create('patterns', function (Blueprint $table) {
            $table->id('pattern_id');
            $table->string('name', 150);
            $table->text('description');
            $table->decimal('price', 10, 2); // Precio con 2 decimales
            $table->enum('difficulty', ['Principiante', 'Intermedio', 'Avanzado']);
            $table->string('category', 100);
            $table->string('image', 255)->nullable(); // Ruta de la imagen
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Elimina la tabla patterns
     */
    public function down(): void
    {
        Schema::dropIfExists('patterns');
    }
};

