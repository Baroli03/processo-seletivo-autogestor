<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
 
    public function run(): void
    {
        $categories = [
            ['name' => 'Sedan'],
            ['name' => 'SUV'],
            ['name' => 'Picape'],
            ['name' => 'Esportivo'],
            ['name' => 'Luxo'],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        };
    }
}