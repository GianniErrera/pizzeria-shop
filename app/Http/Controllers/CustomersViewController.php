<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderLine;
use App\Models\Order;

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
        return view('public.customers-view', [
            "products" => Product::all(),
            'orderlines' => OrderLine::where('order_id', session('order_id'))->get(),
            'order' => Order::find(session('order_id'))
        ]);
    }
}
