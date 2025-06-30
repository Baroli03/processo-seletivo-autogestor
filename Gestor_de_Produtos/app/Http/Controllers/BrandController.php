<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
     public function index()
    {
        $brands = Brand::orderBy('name')->get();
        return view('brands.index', ['brands' => $brands]);
    }

    public function show(Brand $brand)
    {
        $products = $brand->products()->with('category')->get();
        return view('brands.show', [
                'brand' => $brand,
                'products' => $products
            ]);   
    }
}