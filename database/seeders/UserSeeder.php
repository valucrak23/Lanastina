<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Deshabilitar temporalmente las verificaciones de foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // limpia users
        DB::table('users')->truncate();
        
        // Volver a habilitar las verificaciones de foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@lanastina.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // Usuario común de ejemplo
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Usuario Test',
            'email' => 'usuario@lanastina.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
