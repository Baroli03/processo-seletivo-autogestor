<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::truncate(); 

        User::create([
            'name' => 'Admin Teste',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'is_admin' => true,
            'can_manage_products' => false,
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        User::create([
            'name' => 'Usuario Teste',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), 
            'is_admin' => false,
            'can_manage_products' => false,
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        User::create([
            'name' => 'Gestor Produtos',
            'email' => 'produtos@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => true,
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        User::create([
            'name' => 'Gestor Categorias',
            'email' => 'categorias@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => false,
            'can_manage_categories' => true,
            'can_manage_brands' => false,
        ]);

        User::create([
            'name' => 'Gestor Marcas',
            'email' => 'marcas@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => false,
            'can_manage_categories' => false,
            'can_manage_brands' => true,
        ]);

        User::create([
            'name' => 'Super Gestor',
            'email' => 'supergestor@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => true,
            'can_manage_categories' => true,
            'can_manage_brands' => true,
        ]);

        $this->command->info('Usuários de teste criados com sucesso!');
    }
}