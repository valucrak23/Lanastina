<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla blog_posts (artículos del blog)
     * Almacena posts con título, subtítulo, contenido, autor, categoría, imagen y fecha de publicación
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title', 200);
            $table->string('subtitle', 255);
            $table->text('content');
            $table->string('author', 100);
            $table->string('category', 100);
            $table->string('image', 255)->nullable(); // Ruta de la imagen
            $table->timestamp('published_at')->useCurrent(); // Fecha de publicación
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Elimina la tabla blog_posts
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};

