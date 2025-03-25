<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // usuario de prueba:
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Llamar a los seeders personalizados
        $this->call([
            ProductoSeeder::class,
            UnidadOrganizativaSeeder::class,
        ]);
    }
}
