<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Seeder para poblar la tabla users con datos de ejemplo
 * Crea un usuario administrador y un usuario común para pruebas
 */
class UserSeeder extends Seeder
{
    /**
     * Ejecuta el seeder
     * Deshabilita foreign keys, limpia la tabla, inserta usuarios y reactiva foreign keys
     */
    public function run(): void
    {
        // Deshabilita foreign keys para evitar errores al truncar
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Limpia la tabla antes de insertar nuevos datos
        DB::table('users')->truncate();
        
        // Reactiva las verificaciones de foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Usuario administrador
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@lanastina.com',
            'password' => Hash::make('password'), // Contraseña hasheada
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // Usuario común para pruebas
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Usuario Test',
            'email' => 'usuario@lanastina.com',
            'password' => Hash::make('password'), // Contraseña hasheada
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
