<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderExtra;
use App\Models\Extra;
use Illuminate\Http\Request;

class OrderlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        if(!session('order_id') || !Order::where('id', session('order_id'))->exists()) { // check if there is not a order_id is saved in session or if a corresponding record doesn't exists

            $order = new Order();
            $order->save();
            $order_id = $order->id;
            session()->put('order_id', $order->id);
        } else {
            $order_id = session('order_id');
        }

        $request->validate([
            'quantity' => 'numeric|min:1|required'
        ]);

        $orderline = OrderLine::create([
            'product_id' => $product_id,
            'order_id' => $order_id,
            'quantity' => request('quantity')
        ]);

        if(request('extras')) {
            foreach(request('extras') as $extra) {
                if($extra == true) {
                    OrderExtra::create([
                        'order_line_id' => $orderline->id,
                        'extra_id' => $extra,
                        'quantity' => request('quantity')
                    ]);
                }
            }

        }

        return redirect()->route('customers-view');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLine $orderline)
    {
        return view('public.edit-order-line', [
            'orderline' => $orderline,
            "extraline" => OrderExtra::where('order_line_id', $orderline->id)->pluck('extra_id')->toArray(),
            'extras' => Extra::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLine $orderline)
    {
        $request->validate([
            'quantity' => 'numeric|min:1|required'
        ]);
        $orderline_extras =  OrderExtra::where('order_line_id', $orderline->id)->pluck('extra_id')->toArray();
        $all_extras = Extra::all();

        $orderline->quantity = request('quantity'); // update orderline quantity
        $orderline->save();

        if(request('extras')) {
            foreach($all_extras as $extra) {
                if(!in_array($extra->id, $orderline_extras) && in_array($extra->id, request('extras'))) { // if a checkbox is checked but there is no order_extra record in database
                    OrderExtra::create([
                        'order_line_id' => $orderline->id,
                        'extra_id' => $extra->id,
                        'quantity' => request('quantity')
                    ]);
                } elseif(in_array($extra->id, $orderline_extras) && !in_array($extra->id, request('extras'))) { // if there is an exhisting record for a checkbox that is not present in request then user has unchecked the box
                    OrderExtra::where('order_line_id', $orderline->id)
                    ->where('extra_id', $extra->id)->delete();
                }
            }

        } else { // if no checkbox has been checked we delete all order_extra records linked to $orderline
            OrderExtra::where('order_line_id', $orderline->id)->delete();
        }

        return redirect()->route('customers-view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderline $orderline)
    {
        OrderExtra::where('order_line_id', $orderline->id)->delete();
        $orderline->delete();

        return redirect()->route('customers-view');
    }
}
