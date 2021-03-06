<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'category_id', 'description', 'image', 'vegetarian', 'vegan', 'allergens'];

    protected $casts = [
        'vegetarian' => 'boolean',
        'vegan' => 'boolean',
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }
}
