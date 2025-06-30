<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Deixando nome como unico para que não tenha duplicatas no banco
            $table->string('name')->unique();
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            // Criando relacionamento de Produto com marca e categoria
            // Um pra muitos, onde categoria e marca tem muitos produtos
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};