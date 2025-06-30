<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Importa o modelo User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa a tabela de usuários antes de popular, útil para testes repetidos
        User::truncate(); 

        // 1. Usuário Administrador
        // Senha padrão para todos: 'password'
        // is_admin = true, outras permissões de gestão são false para o admin (conforme regra)
        User::create([
            'name' => 'Admin Teste',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'is_admin' => true,
            'can_manage_products' => false,
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        // 2. Usuário Comum "Test" (sem nenhuma permissão de gestão)
        User::create([
            'name' => 'Usuario Teste',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), 
            'is_admin' => false,
            'can_manage_products' => false,
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        // 3. Usuário Comum com Permissão de Gestão de Produtos
        User::create([
            'name' => 'Gestor Produtos',
            'email' => 'produtos@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => true,
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        // 4. Usuário Comum com Permissão de Gestão de Categorias
        User::create([
            'name' => 'Gestor Categorias',
            'email' => 'categorias@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => false,
            'can_manage_categories' => true,
            'can_manage_brands' => false,
        ]);

        // 5. Usuário Comum com Permissão de Gestão de Marcas
        User::create([
            'name' => 'Gestor Marcas',
            'email' => 'marcas@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'can_manage_products' => false,
            'can_manage_categories' => false,
            'can_manage_brands' => true,
        ]);

        // 6. Usuário Comum com TODAS as permissões de gestão (não é admin)
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