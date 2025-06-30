<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // fillable serve para indicar quais dados podem ser criados pelo model
    
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_path',
        'brand_id',
        'category_id',
    ];

    // define o relacionamento entre brand e produto
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    // define o relacionamento entre category e produto
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}