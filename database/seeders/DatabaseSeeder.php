<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ejecuto todos los seeders
        $this->call([
            UserSeeder::class,
            PatternSeeder::class,
            BlogPostSeeder::class
        ]);
    }
}
