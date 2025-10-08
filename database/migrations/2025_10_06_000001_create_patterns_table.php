<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // tabla patrones de crochet
        Schema::create('patterns', function (Blueprint $table) {
            $table->id('pattern_id');
            $table->string('name', 150);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->enum('difficulty', ['Principiante', 'Intermedio', 'Avanzado']);
            $table->string('category', 100);
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patterns');
    }
};

