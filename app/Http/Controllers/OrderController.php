<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderExtra;

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

        $validated = $request->validate([
            'name' => 'required|string|max:48',
            'surname' => 'required|string|max:48',
            'address_line_1' => 'required|string|max:50',
            'address_line_2' => 'string|max:50',
            'delivery_notes' => 'string|max:50',
            'city' => 'required|string|max:20'
        ]);

        $order->fill([
            'name' => request('name'),
            'surname' => request('surname'),

        ]);



    }
}
