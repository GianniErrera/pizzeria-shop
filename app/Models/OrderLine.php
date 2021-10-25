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

    public function totalPrice() {
        $total = 0;
        $product_price = $this->product->price;
        $total += $product_price * $this->quantity;

        $orderExtras = OrderExtra::where('order_line_id', $this->id)->get();
        foreach($orderExtras as $orderExtra) {
            $total += $orderExtra->extra->price * $this->quantity;
        }

        return $total;
    }

    public function extrasPrice() {
        $total = 0;
        $orderExtras = OrderExtra::where('order_line_id', $this->id)->get();

        foreach($orderExtras as $orderExtra) {
            $total += $orderExtra->extra->price * $this->quantity;
        }

        return $total;
    }

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
