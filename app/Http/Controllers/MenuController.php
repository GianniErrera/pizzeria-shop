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
    public function store(Request $request)
    {
        if(request('category_id') != "0") {
            $validated = $request->validate([
                'name' => 'required|max:100|unique:products',
                'price' => 'numeric|required',
                'category_id' => 'required|integer',
                'description' => 'nullable|string',
                'vegetarian' => 'boolean',
                'vegan' => 'boolean',
                'allergens' => 'nullable|string'
            ]);
            Product::create($validated);
        } else {
            $validated = $request->validate([
                'name' => 'required|max:100|unique:extras',
                'price' => 'numeric|required',
                'category_id' => 'required|integer',
                'description' => 'nullable|string',
                'vegetarian' => 'boolean',
                'vegan' => 'boolean',
                'allergens' => 'nullable|string'
            ]);
        Extra::create($validated);
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
