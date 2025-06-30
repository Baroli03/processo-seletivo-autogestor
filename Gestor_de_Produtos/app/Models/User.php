<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // hasfactory serve para indicar que essa classe é uma fabrica 
    use HasFactory, Notifiable;
    // fillable serve para indicar quais dados podem ser criados pelo model
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

}
