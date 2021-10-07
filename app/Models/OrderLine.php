<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderExtra;
use App\Models\Extra;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function orderExtras() {
        return $this->hasMany(OrderExtra::class);
    }

}
