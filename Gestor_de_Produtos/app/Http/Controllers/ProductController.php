<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('name')->get();

        return view('products.index')->with('products', $products);
    }

    
}