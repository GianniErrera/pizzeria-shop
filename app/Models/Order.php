<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderLine;

class Order extends Model
{
    use HasFactory;


    public function totalPrice() {
        $total_price = 0;
        $orderlines = OrderLine::where('order_id', $this->id)->get();

        foreach($orderlines as $orderline) {
            $total_price += $orderline->totalPrice();
        }

        return $total_price;

    }

    public function orderLines() {
        return $this->hasMany(OrderLine::class);
    }

    public function products() {
        return $this->hasManyThrough(Product::class, OrderLine::class);
    }


}
