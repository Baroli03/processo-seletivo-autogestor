<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // fillable serve para indicar quais dados podem ser criados pelo model
    
    protected $fillable = [
        'name',
    ];
}
