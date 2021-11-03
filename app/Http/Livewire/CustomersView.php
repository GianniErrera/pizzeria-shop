<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\OrderLine;
use App\Models\Extra;
use App\Models\Order;
use App\Models\OrderExtra;


class CustomersView extends Component
{

    protected $listeners = ["refresh-customers-view" => '$refresh'];

    //main component properties
    public $products;
    public $orderlines;
    public $extras;
    public $order;
    public $categories;
    public $pizzas;

    protected $rules = [
        'quantity' => 'required|min:1|max:100'
    ];

    public function mount() {
        $this->products = Product::all();
        $this->orderlines = OrderLine::where('order_id', session('order_id'))->get();
        $this->extras = Extra::all();
        $this->order = Order::find(session('order_id'));
        $this->categories = Category::all()->sortBy('order_id');
        $this->pizzas = Product::where('category_id', 1)->get();
    }


    public function render()
    {
        return view('livewire.customers-view', [
            "products" => $this->products,
            'orderlines' => $this->orderlines,
            'extras' => $this->extras,
            'order' => $this->order,
            'categories' => $this->categories,
            'pizzas' => $this->pizzas
            ]);
    }

}
