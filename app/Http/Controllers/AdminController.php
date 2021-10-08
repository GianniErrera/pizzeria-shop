<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function show() {
        $incoming_orders = Order::where('order_status', '1')->get();
        return view('admin.incoming-orders', ['orders' => $incoming_orders]);
    }

    public function dispatched(Order $order) {

        $order->order_status = 2;
        $order->save();

        return redirect()->route('orders.incoming')->with('status', 'Order dispatched successfully.');
    }
}
