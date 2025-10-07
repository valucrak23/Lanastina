<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar tabla antes de insertar
        DB::table('blog_posts')->truncate();
        
        DB::table('blog_posts')->insert([
            [
                'title' => 'Guía completa de puntos básicos de crochet',
                'subtitle' => 'Aprende los fundamentos del tejido a crochet desde cero',
                'content' => 'El crochet es una técnica de tejido versátil y relajante que utiliza una aguja con gancho para crear hermosas piezas. En esta guía, exploraremos los puntos básicos que todo principiante debe conocer: el punto cadena, el punto bajo, el punto medio alto y el punto alto. Cada uno de estos puntos forma la base para proyectos más complejos. El punto cadena es la base de todo proyecto, el punto bajo crea una textura densa y firme, mientras que los puntos más altos añaden altura y ligereza a tus tejidos. Con práctica y paciencia, dominarás estos puntos fundamentales.',
                'author' => 'María González',
                'category' => 'Tutoriales',
                'image' => null,
                'published_at' => now()->subDays(5),
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'title' => 'Cómo elegir el hilo perfecto para tu proyecto',
                'subtitle' => 'Descubre los diferentes tipos de hilados y sus usos',
                'content' => 'La elección del hilo es crucial para el éxito de tu proyecto de crochet. Existen numerosos tipos de fibras: algodón, acrílico, lana, bambú y mezclas. El algodón es ideal para prendas de verano y artículos de cocina por su durabilidad y capacidad de absorción. El acrílico es económico, fácil de mantener y perfecto para principiantes. La lana ofrece calidez y elasticidad, ideal para prendas de invierno. El bambú es suave y ecológico. Considera también el grosor del hilo: desde hilo de encaje fino hasta hilados super gruesos. Cada proyecto requiere una fibra específica según su uso final.',
                'author' => 'Laura Fernández',
                'category' => 'Consejos',
                'image' => null,
                'published_at' => now()->subDays(10),
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'title' => 'Tendencias en crochet para esta temporada',
                'subtitle' => 'Los diseños más populares que están conquistando el mundo del tejido',
                'content' => 'El mundo del crochet está en constante evolución. Este año, vemos un resurgimiento de los granny squares con combinaciones de colores audaces y modernas. Los tops calados para verano continúan siendo populares, especialmente en tonos tierra y pasteles. Los amigurumis personalizados son tendencia, con diseños que van desde personajes de películas hasta mascotas realistas. Las prendas oversized tejidas en punto bajo están conquistando las pasarelas. Los accesorios como bolsos de red y bucket hats se mantienen vigentes. La sostenibilidad también marca tendencia, con más tejedoras optando por hilos reciclados y naturales.',
                'author' => 'Sofía Martínez',
                'category' => 'Tendencias',
                'image' => null,
                'published_at' => now()->subDays(3),
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'title' => '5 errores comunes al tejer amigurumis',
                'subtitle' => 'Evita estos problemas frecuentes en tus proyectos de amigurumi',
                'content' => 'Los amigurumis son adorables pero pueden presentar desafíos. Error 1: No usar un marcador de vueltas, lo que lleva a perder la cuenta. Solución: usa un trozo de hilo contrastante. Error 2: Tejer muy suelto, creando huecos donde se ve el relleno. Solución: usa una aguja más pequeña de lo recomendado. Error 3: No rellenar uniformemente, dejando bultos. Solución: rellena gradualmente mientras tejes. Error 4: No contar los puntos en cada vuelta. Solución: cuenta siempre antes de cerrar la vuelta. Error 5: Unir partes con puntadas visibles. Solución: aprende la técnica de costura invisible. Con estos consejos, tus amigurumis lucirán profesionales.',
                'author' => 'Ana Rodríguez',
                'category' => 'Tutoriales',
                'image' => null,
                'published_at' => now()->subDays(15),
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'title' => 'Organiza tu espacio de tejido como una profesional',
                'subtitle' => 'Tips para mantener tus materiales ordenados y accesibles',
                'content' => 'Un espacio de trabajo organizado mejora tu creatividad y productividad. Invierte en contenedores transparentes para clasificar hilos por color o tipo. Usa organizadores de pared para agujas y accesorios. Mantén tus patrones en carpetas o archivadores. Crea una estación de trabajo con buena iluminación natural o una lámpara LED. Guarda los proyectos en curso en bolsas individuales con sus materiales. Etiqueta todo claramente. Considera un carrito rodante para facilitar el movimiento. Dedica un espacio específico, aunque sea pequeño, exclusivamente para tu hobby. La organización reduce el estrés y te permite disfrutar más del proceso creativo.',
                'author' => 'Carmen López',
                'category' => 'Consejos',
                'image' => null,
                'published_at' => now()->subDays(7),
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
        ]);
    }
}

