<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Volkswagen'],
            ['name' => 'Chevrolet'],
            ['name' => 'BYD'],
            ['name' => 'Renault'],
            ['name' => 'Jeep'],
        ];

        foreach ($brands as $brandsdata) {
            Brand::create($brandsdata);
        }

    }
}
