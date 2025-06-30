<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;    // Importe seu UserSeeder
use Database\Seeders\BrandSeeder;   // Importe BrandSeeder
use Database\Seeders\CategorySeeder; // Importe CategorySeeder
use Database\Seeders\ProductSeeder; // Importe ProductSeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // NOTA IMPORTANTE: A ordem importa por causa das chaves estrangeiras!
        // Marcas e Categorias devem ser criadas ANTES dos Produtos.
        // Usuários podem ser criados a qualquer momento, mas é bom tê-los para logs/testes.

        $this->call([
            BrandSeeder::class,    // Popula a tabela 'brands'
            CategorySeeder::class, // Popula a tabela 'categories'
            UserSeeder::class,     // Popula a tabela 'users' com perfis de teste
            ProductSeeder::class,  // Popula a tabela 'products' (que depende de marcas e categorias)
        ]);
    }
}