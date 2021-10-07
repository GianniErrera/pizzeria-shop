<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'category', 'description', 'vegetarian', 'vegan', 'allergens'];

    protected $casts = [
        'vegetarian' => 'boolean',
        'vegan' => 'boolean',
    ];
}
