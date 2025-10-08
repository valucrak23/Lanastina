<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // limpia users
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@lanastina.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
