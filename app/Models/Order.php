<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderLine;

class Order extends Model
{
    use HasFactory;

    public function orderLines() {
        return $this->hasMany(OrderLine::class);
    }

    public function products() {
        return $this->hasManyThrough(Product::class, OrderLine::class);
    }


}
