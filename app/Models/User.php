<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les attributs pouvant être assignés en masse.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Les attributs cachés dans les réponses JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les types de conversion d'attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
}
