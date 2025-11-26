<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea las tablas de usuarios, tokens de reset de contraseña y sesiones
     * Tabla users: usuarios del sistema con autenticación Laravel
     * Tabla password_reset_tokens: tokens para recuperación de contraseña
     * Tabla sessions: almacenamiento de sesiones de usuario
     */
    public function up(): void
    {
        // Tabla principal de usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); // Token para "recordar sesión"
            $table->timestamps(); // created_at, updated_at
        });

        // Tabla para tokens de recuperación de contraseña
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabla para almacenar sesiones de usuario
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload'); // Datos de la sesión
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Elimina las tablas creadas
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
