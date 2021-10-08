<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderLine;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
                            'user_id',
                            'order_status',
                            'total_price',
                            'order_placed_at',
                            'customer_name',
                            'customer_surname',
                            'email',
                            'address_line_1',
                            'address_line_2',
                            'delivery_notes',
                            'city',
                            'postal_code'
                    ];

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
