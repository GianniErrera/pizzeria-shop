<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Extra;
use App\Models\Category;
use Illuminate\Validation\Rule;


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
    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:100', Rule::unique('products')->ignore($product->id)],
            'price' => 'numeric|required',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'vegetarian' => 'boolean',
            'vegan' => 'boolean',
            'allergens' => 'nullable|string',
            'image' => 'image|nullable'
        ]);

        if(request('image')) {
            $extension = $request->file('image')->extension();
            $path = $request->image->storePubliclyAs('images', $product->category->name . '-' . $product->id .  "." . $extension, 'public');
            $product->image = $path;
            $product->save();
        }

        $product->fill($validated);
        $product->save();

        $request->session()->flash('status', 'Product modified successfully!');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateExtra(Request $request, Extra $extra) {

    $validated = $request->validate([
        'name' => ['required', 'max:100', Rule::unique('extras')->ignore($extra->id)],
        'price' => 'numeric|required',
        'category_id' => 'nullable|integer',
        'description' => 'nullable|string',
        'vegetarian' => 'boolean',
        'vegan' => 'boolean',
        'allergens' => 'nullable|string',
        'image' => 'image|nullable'
    ]);

    if(request('image')) {
        $extension = $request->file('image')->extension();
        $path = $request->image->storePubliclyAs('images', 'extra-' . $extra->id .  "." . $extension, 'public');
        $extra->image = $path;
        $extra->save();
    }

    $extra->fill($validated);
    $extra->save();

    $request->session()->flash('status', 'Extra modified successfully!');
    return redirect()->route('admin.dashboard');

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
