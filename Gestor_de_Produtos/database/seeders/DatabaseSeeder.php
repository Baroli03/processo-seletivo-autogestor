<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder; 
use Database\Seeders\BrandSeeder;   
use Database\Seeders\CategorySeeder; 
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
  
    public function run(): void
    {


        $this->call([
            BrandSeeder::class,    
            CategorySeeder::class,
            UserSeeder::class,     
            ProductSeeder::class, 
        ]);
    }
}