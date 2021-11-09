<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Extra;

class ProductController extends Controller
{
    public function store(Request $request)
    {    // this method creates both Category and Extra records on the fly since there is only a single form for both models
        if(request('category_id') != "0") {
            $validated = $request->validate([
                'name' => 'required|max:100|unique:products',
                'price' => 'numeric|required',
                'category_id' => 'required|integer',
                'description' => 'nullable|string',
                'vegetarian' => 'boolean',
                'vegan' => 'boolean',
                'allergens' => 'nullable|string',
                'image' => 'image|nullable'
            ]);
            $product = Product::create($validated);
        } else {
            $validated = $request->validate([
                'name' => 'required|max:100|unique:extras',
                'price' => 'numeric|required',
                'category_id' => 'required|integer',
                'description' => 'nullable|string',
                'vegetarian' => 'boolean',
                'vegan' => 'boolean',
                'allergens' => 'nullable|string',
                'image' => 'image|nullable'
            ]);
            Extra::create($validated);
        }

        if(request('image')) {
            $extension = $request->file('image')->extension();
            $path = $request->image->storePubliclyAs('images', $product->category->name . '-' . $product->id .  "." . $extension, 'public');
            $product->image = $path;
            $product->save();
        }

        $request->session()->flash('status', 'Product added successfully!');
        return back();

    }

    public function show(Product $product) {
        return view('template.product-detail', [
            'product' => $product
        ]);
    }

    public function edit(Product $product) {
        return view('admin.product-extra-edit', ['product' => $product, 'categories' => Category::all()->sortBy('sort_order')]);
    }

    public function update(Product $product, Request $request) {

    }

    public function delete(Product $product) {

    }

}
