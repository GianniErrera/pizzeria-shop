<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderLine;

class CustomersViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $total = 0;
        $orderlines = OrderLine::where('order_id', session('order_id'))->get();
        foreach($orderlines as $orderline) {
            $total += $orderline->totalPrice();
        }
        return view('public.customers-view', [
            "products" => Product::all(),
            'orderlines' => OrderLine::where('order_id', session('order_id'))->get(),
            'total_order_price' => $total
        ]);
    }
}
