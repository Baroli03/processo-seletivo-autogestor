<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        $products = $category->products()->with('brand')->get();
        return view('categories.show', [
                'category' => $category,
                'products' => $products
            ]);   
    }

}