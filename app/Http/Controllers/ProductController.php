<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Extra;

class ProductController extends Controller
{
    public function store() {
        dd(request());
    }

    public function show($id) {

        return view('public.product-detail', [
            'product' => Product::where('id', $id)->first(),
            'extras' => Extra::all()
        ]);
    }

}
