<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'vegetarian', 'vegan', 'allergens'];

    protected $casts = [
        'vegetarian' => 'boolean',
        'vegan' => 'boolean',
    ];
}
