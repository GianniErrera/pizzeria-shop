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

    public function show(Product $product) {
        return view('template.product-detail', [
            'product' => $product
        ]);
    }

}
