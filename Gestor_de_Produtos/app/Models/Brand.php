<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Brand extends Model
{
    // fillable serve para indicar quais dados podem ser criados pelo model
    
    protected $fillable = [
        'name',
    ];

     public function products()
    {
        return $this->hasMany(Product::class);
    }
}