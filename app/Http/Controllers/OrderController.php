<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderExtra;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function show(Order $order) {
        return view('order.confirm', compact('order'));
    }

    public function destroy(Order $order)
    {
        $orderlines = OrderLine::where('order_id', $order->id)->get();
        if($orderlines) {
            foreach($orderlines as $orderline) {
                $orderExtras = OrderExtra::where('order_line_id', $orderline->id)->get();
                if($orderExtras) {
                    foreach($orderExtras as $orderExtra) {
                        $orderExtra->delete();
                    }
                }
                $orderline->delete();
            }
        }

        $order->delete();
        request()->session()->forget('order_id');

        return redirect()->route('customers-view');
    }

    public function store(Request $request, Order $order) {

        $request->validate([
            'customer_name' => 'required|string|max:48',
            'customer_surname' => 'required|string|max:48',
            'email' => 'email:rfc,dns',
            'address_line_1' => 'required|string|max:50',
            'address_line_2' => 'string|max:50',
            'delivery_notes' => 'string|max:50',
            'city' => 'required|string|max:20',
            'postal_code' => 'string'
        ]);

        $order->fill([
            'order_status' => 'submitted order',
            'total_price' => $order->totalPrice(),
            'order_datetime' => Carbon::now(),
            'customer_name' => request('customer_name'),
            'customer_surname' => request('customer_surname'),
            'email' => request('email') ? request('email') : '',
            'address_line_1' => 'required|string|',
            'address_line_2' => request('address_line_2') ? request('address_line_2') : '',
            'delivery_notes' => request('delivery_notes') ? request('delivery_notes') : '',
            'city' => request('city'),
            'postal_code' => request('postal_code') ? request('postal_code') : ''
        ]);

        $order->save();
        request()->session()->forget('order_id');

        return redirect()->route('customers-view')->with('status', 'Order placed successfully. Thank you!');



    }
}
