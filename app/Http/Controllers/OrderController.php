<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderExtra;

class OrderController extends Controller
{
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
}
