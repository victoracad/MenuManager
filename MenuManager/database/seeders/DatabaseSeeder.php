<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chama o seeder de usuários
        $this->call([
            UserSeeder::class,
        ]);
    }
}
