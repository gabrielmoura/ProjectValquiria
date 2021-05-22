<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('welcome', compact('products'));
    }

    public function single($slug)
    {
        $product = Product::whereSlug($slug)->first();
        return view('single', compact('product'));
    }
}
