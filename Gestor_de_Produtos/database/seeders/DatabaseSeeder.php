<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Criando um Usuario admin e senha password
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'is_admin' => true, 
        ]);
        // Criando um Usuario normal login Test e senha password
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), 
            'is_admin' => false, 
        ]);

        // aqui fazemos rodar os seeders
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
