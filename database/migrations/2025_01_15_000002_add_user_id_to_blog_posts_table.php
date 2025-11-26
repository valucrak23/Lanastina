<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Agrega la columna 'user_id' a la tabla blog_posts
     * Crea foreign key hacia users.id
     * onDelete('set null'): si se elimina el usuario, user_id se establece en null
     */
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('post_id')->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Elimina la foreign key y la columna 'user_id' de blog_posts
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};

