<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%')
                ->orWhere('slug', 'like', '%' . $request->search . '%')
                ->get();
            return view('search', compact('products'));
        }
        return redirect()->route('home');
    }
}
