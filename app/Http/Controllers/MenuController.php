<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Topping;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin-dashboard', [
            'pizzas' => Pizza::all(),
            'toppings' => Topping::all()
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
        if(request('product_type') == "pizza") {
            $validated = $request->validate([
                'name' => 'required|max:100',
                'price' => 'numeric|required',
                'description' => 'nullable!string',
                'vegetarian' => 'boolean',
                'vegan' => 'boolean',
                'allergens' => 'nullable|string'
            ]);


            Pizza::create($validated);
        }

        if(request('product_type') == "topping") {
            $validated = $request->validate([
                'name' => 'required|max:50',
                'price' => 'numeric|required',
                'description' => 'string',
                'vegetarian' => 'boolean',
                'vegan' => 'boolean',
                'allergens' => 'string'
            ]);
            Topping::create($validated);
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
