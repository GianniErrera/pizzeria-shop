<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Extra;
use App\Models\Category;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard', [
            'products' => Product::all(),
            'extras' => Extra::all(),
            'categories' => Category::all()->sortBy('sort_order')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeProductOrExtra(Request $request)
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('template.product-detail', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Product $product) {
        return view('admin.product-extra-edit', ['product' => $product, 'categories' => Category::all()->sortBy('sort_order')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editExtra(Extra $extra) {
        return view('admin.product-extra-edit', ['extra' => $extra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        dd('ok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateExtra(Request $request, $id)
    {
        dd('good');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct(Product $product)
    {
        $product->delete();

        request()->session()->flash('status', 'Product deleted successfully!');
        return back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyExtra(Extra $extra)
    {
        $extra->delete();

        request()->session()->flash('status', 'Extra deleted successfully!');
        return back();
    }
}
