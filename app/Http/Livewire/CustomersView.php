<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Orderline;
use App\Models\Extra;
use App\Models\Order;



class CustomersView extends Component
{

    protected $listeners = ["refresh-customers-view" => '$refresh'];

    public $products;
    public $orderlines;
    public $extras;
    public $order;
    public $categories;

    public function test() {
        //dd('triggered');
    }

    public function mount() {
        $this->products = Product::all();
        $this->orderlines = OrderLine::where('order_id', session('order_id'))->get();
        $this->extras = Extra::all();
        $this->order = Order::find(session('order_id'));

    }

    public function render()
    {
        return view('livewire.customers-view', [
            "products" => $this->products,
            'orderlines' => $this->orderlines,
            'extras' => $this->extras,
            'order' => $this->order
            ]);
    }

}
