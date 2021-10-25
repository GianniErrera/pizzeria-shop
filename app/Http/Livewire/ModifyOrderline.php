<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderLine;
use App\Models\Extra;
use App\Models\OrderExtra;

class ModifyOrderline extends Component
{
    public $orderline;
    public $extralines; // these are the initial extralines ids associated to current orderline
    public $extras;
    public $checkedExtras; // these are the currently checked checkboxes
    public $quantity;
    public $totalExtrasPrice = 0;


    public function mount(Orderline $orderline, $extralines, $extras) { // initially we calculate initital total cost of extras
        $this->orderline = $orderline;
        $this->extralines = $extralines;
        $this->extras = $extras;
        $this->quantity = $this->orderline->quantity;
        foreach($this->extralines as $extra_id) {
            $this->checkedExtras[$extra_id] = $extra_id; // we take initial checked extras associated to orderline and we populate a new array since it's a 0 based ordered array
            $this->totalExtrasPrice += Extra::find($extra_id)->price;
        }

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

    public function updatedCheckedExtras() {
        $this->totalExtrasPrice = 0;

        foreach($this->checkedExtras as $extra_id) {
            if($extra_id != false) {
                $this->totalExtrasPrice += Extra::find($extra_id)->price;
            }
        }

        return $this->totalExtrasPrice;
    }

    public function updateOrderline() {
        if($this->orderline->quantity != $this->quantity) { // if quantity in order has been updated
            $this->orderline->quantity = $this->quantity;
            $this->orderline->save();
        }

        foreach($this->extras as $extra) {
            if((array_key_exists($extra->id, $this->checkedExtras) && $this->checkedExtras[$extra->id] != false) // if not false this checkbox has been been selected
            && ! OrderExtra::where('order_line_id', $this->orderline->id)->where('extra_id', $extra->id)->exists()) { // if there is not already a record in database

                OrderExtra::create([
                'order_line_id' => $this->orderline->id,
                'extra_id' => $extra->id,
                'quantity' => $this->quantity
                ]);

            } elseif(OrderExtra::where('order_line_id', $this->orderline->id)->where('extra_id', $extra->id)->exists()) { // if extra was associated to orderline but now checkbox has been unselected
                    if(!array_key_exists($extra->id, $this->checkedExtras) || $this->checkedExtras[$extra->id] == false) {
                        OrderExtra::where('order_line_id', $this->orderline->id)->where('extra_id', $extra->id)->delete();
                    }

            }

        }

        return redirect()->to(route('customers-view')."#cart");

    }

    public function render()
    {
        return view('livewire.modify-orderline', [
            'orderline' => $this->orderline,
            'extras' => $this->extras,
            'product' => $this->orderline->product

        ]);
    }
}
