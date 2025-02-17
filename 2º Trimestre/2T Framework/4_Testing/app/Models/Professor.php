<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Professor extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'fullname',
        'age',
        'gender',
        'address',
        'telephone',
        'email',
        'password', // Agregado
    ];

    protected $hidden = [
        'password', // Agregado
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}