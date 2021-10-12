<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:50|unique:categories'
    ];

    public function updateCategoriesOrder($list) {
        foreach($list as $category)
            Category::find($category['value'])->update(['sort_order' => $category['order']]);
    }

    public function addCategory() {

        $this->validate();
        $category = Category::create([
            "name" => $this->name
        ]);
        $category->update(['sort_order' => $category->id]);
        session()->flash('message', 'Category successfully added.');
        $this->name = "";
    }

    public function removeCategory($category_id) {
        Category::find($category_id)->delete();
    }

    public function render()    {
        return view('livewire.categories', [
            'categories' => Category::orderBy('sort_order')->get()
        ]);
    }
}
