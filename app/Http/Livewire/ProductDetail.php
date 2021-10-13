<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Extra;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderExtra;

class ProductDetail extends Component
{
    public $product;
    public $quantity = 1;
    public $productExtras = [];
    public $order_id;
    public $orderline;
    public $extras;
    public $totalExtrasPrice = 0;

    protected $rules = [
        'quantity' => 'required|min:1|max:100'
    ];

    public function mount(Product $product) {
        $this->product = $product;
    }

    public function add() {
        if($this->quantity < 100) {
            $this->quantity += 1;
        }
    }

    public function subtract() {
        if($this->quantity > 1) {
            $this->quantity -= 1;
        }
    }

    public function updatedProductExtras() {
        $this->totalExtrasPrice = 0;

        foreach($this->productExtras as $extra_id) {
            if($extra_id != false) {
                $this->totalExtrasPrice += Extra::find($extra_id)->price;
            }
        }
        return $this->totalExtrasPrice;
    }

    public function addToCart() {
        $this->validate();

        if(!session('order_id') || !Order::where('id', session('order_id'))->exists()) { // check if there is not a order_id is saved in session or if a corresponding record doesn't exists

            $order = new Order();
            $order->save();
            $this->order_id = $order->id;
            session()->put('order_id', $order->id);
        } else {
            $this->order_id = session('order_id');
        }


        $this->orderline = OrderLine::create([
            'product_id' => $this->product->id,
            'order_id' => $this->order_id,
            'quantity' => $this->quantity
        ]);


        foreach($this->productExtras as $extra_id) {

            OrderExtra::create([
                'order_line_id' => $this->orderline->id,
                'extra_id' => $extra_id,
                'quantity' => $this->quantity
            ]);

        }


    }

    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product,
            'extras' => Extra::all()
        ]);
    }
}
