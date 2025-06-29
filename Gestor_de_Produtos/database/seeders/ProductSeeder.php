<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $products = [
            [
                'name' => 'Jetta GLI',
                'price' => 245390.00,
                'description' => 'Sedan esportivo da Volkswagen com motor 2.0 Turbo.',
                'brand_id' => 1, // Volkswagen
                'category_id' => 4, // Esportivo
            ],
            [
                'name' => 'Compass Limited',
                'price' => 216990.00,
                'description' => 'SUV da Jeep com motor T270 Turbo Flex.',
                'brand_id' => 5, // Jeep
                'category_id' => 2, // SUV
            ],
            [
                'name' => 'S10 High Country',
                'price' => 302900.00,
                'description' => 'Picape robusta da Chevrolet, topo de linha.',
                'brand_id' => 2, // Chevrolet
                'category_id' => 3, // Picape
            ],
            [
                'name' => 'BYD Seal',
                'price' => 296800.00,
                'description' => 'Sedan elétrico de luxo com alta performance e autonomia.',
                'brand_id' => 3, // BYD
                'category_id' => 5, // Luxo
            ],
            [
                'name' => 'Virtus Exclusive',
                'price' => 152190.00,
                'description' => 'Versão topo de linha do sedan compacto da Volkswagen.',
                'brand_id' => 1, // Volkswagen
                'category_id' => 1, // Sedan
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
