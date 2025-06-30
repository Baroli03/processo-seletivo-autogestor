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
                'image_path' => 'https://cdn.motor1.com/images/mgl/br7lw/s3/volkswagen-jetta-gli-2-0-tsi-brasil.webp',
                'brand_id' => 1, // Volkswagen
                'category_id' => 4, // Esportivo
            ],
            [
                'name' => 'Compass Limited',
                'price' => 216990.00,
                'description' => 'SUV da Jeep com motor T270 Turbo Flex.',
                'image_path' => 'https://cdn.motor1.com/images/mgl/eoO7mp/s3/jeep-compass-limited-diesel-2025.webp',

                'brand_id' => 5, // Jeep
                'category_id' => 2, // SUV
            ],
            [
                'name' => 'S10 High Country',
                'price' => 302900.00,
                'description' => 'Picape robusta da Chevrolet, topo de linha.',
                'image_path' => 'https://www.estadao.com.br/resizer/v2/PSQQQY4SKVPZRC4OOWDUMGIYOI.jpg?quality=80&auth=12d2dc7fd4ff87bdec64a1293a77c5ae526cb7c21fa267300707912818c33ba7&width=1262&height=710&smart=true',
                'brand_id' => 2, // Chevrolet
                'category_id' => 3, // Picape
            ],
            [
                'name' => 'BYD Seal',
                'price' => 296800.00,
                'description' => 'Sedan elétrico de luxo com alta performance e autonomia.',
                'image_path' => 'https://cdn.motor1.com/images/mgl/2NZ8Bg/s1/byd-seal.webp',
                'brand_id' => 3, // BYD
                'category_id' => 5, // Luxo
            ],
            [
                'name' => 'Virtus Exclusive',
                'price' => 152190.00,
                'description' => 'Versão topo de linha do sedan compacto da Volkswagen.',                
                'image_path' => 'https://s2-autoesporte.glbimg.com/Q1O2WfAg_W3PAd2Eotra-5pMCyM=/0x0:1400x788/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/V/g/pWwC2ARNePjdNvDcsCBA/volkswagen-virtus-exclusive-.jpg',
                'brand_id' => 1, // Volkswagen
                'category_id' => 1, // Sedan
                
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}