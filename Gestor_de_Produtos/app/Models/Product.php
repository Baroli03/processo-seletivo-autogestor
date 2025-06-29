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
        'brand_id',
        'category_id',
    ];
}
