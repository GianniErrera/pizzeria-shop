<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('sort_order', 'ASC')->get();
        return view('admin.products-categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "string|max:50|unique:categories"
        ]);

        $category = Category::create($validated);
        $category->sort_order = $category->id;
        $category->save();
        return back()->with('status', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Move product category up or down the list the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function sort(Category $category, Request $request)
    {
        if(request('direction') == 'up') { // swap sort order value with category which has the biggest value between those who have less value
            $upper = Category::where('sort_order', '<', $category->sort_order)->orderBy('sort_order', 'DESC')->first();
            $upper->sort_order = $upper->sort_order + 1;
            $upper->save();
            $category->sort_order = $category->sort_order - 1;
            $category->save();
        } elseif(request('direction') == "down") {
            $lower = Category::where('sort_order', '>', $category->sort_order)->orderBy('sort_order', 'ASC')->first();
            $lower->sort_order = $lower->sort_order - 1;
            $lower->save();
            $category->sort_order = $category->sort_order + 1;
            $category->save();
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
