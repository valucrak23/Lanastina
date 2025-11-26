<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para poblar la tabla patterns con datos de ejemplo
 * Inserta 6 patrones de crochet con diferentes categorías y dificultades
 */
class PatternSeeder extends Seeder
{
    /**
     * Ejecuta el seeder
     * Deshabilita foreign keys, limpia la tabla, inserta datos y reactiva foreign keys
     */
    public function run(): void
    {
        // Deshabilita foreign keys para evitar errores al truncar
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Limpia la tabla antes de insertar nuevos datos
        DB::table('patterns')->truncate();
        
        // Reactiva las verificaciones de foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Inserta los patrones de ejemplo
        DB::table('patterns')->insert([
            [
                'name' => 'Amigurumi Conejito',
                'description' => 'Adorable patrón de conejito en crochet. Perfecto para principiantes. Incluye instrucciones detalladas paso a paso con fotos ilustrativas.',
                'price' => 450.00,
                'difficulty' => 'Principiante',
                'category' => 'Amigurumi',
                'image' => 'img/conejito.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manta Granny Square',
                'description' => 'Hermosa manta tejida con la técnica clásica de granny squares. Ideal para decorar tu hogar con estilo vintage. Patrón completo con diagrama de puntos.',
                'price' => 650.00,
                'difficulty' => 'Intermedio',
                'category' => 'Mantas',
                'image' => 'img/manta.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Top Veraniego Calado',
                'description' => 'Elegante top tejido con punto calado perfecto para el verano. Incluye tallas S, M, L y XL. Patrón con esquema detallado y explicaciones.',
                'price' => 850.00,
                'difficulty' => 'Avanzado',
                'category' => 'Prendas',
                'image' => 'img/topsito.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Posavasos Florales',
                'description' => 'Set de 4 posavasos con diseño floral. Proyecto rápido y práctico. Perfecto para regalar o decorar tu mesa con un toque artesanal.',
                'price' => 350.00,
                'difficulty' => 'Principiante',
                'category' => 'Hogar',
                'image' => 'img/posavasos.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bolso Boho Chic',
                'description' => 'Moderno bolso estilo boho con asas de cuero sintético. Espacioso y resistente. Patrón incluye técnicas de construcción y acabado profesional.',
                'price' => 950.00,
                'difficulty' => 'Avanzado',
                'category' => 'Accesorios',
                'image' => 'img/bolso.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amigurumi Osito',
                'description' => 'Tierno osito de crochet con bufanda tejida. Tamaño aproximado 20cm. Patrón detallado con fotos del proceso y lista de materiales.',
                'price' => 500.00,
                'difficulty' => 'Principiante',
                'category' => 'Amigurumi',
                'image' => 'img/osito.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

