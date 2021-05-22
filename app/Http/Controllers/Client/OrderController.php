<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $userOrders = auth()->user()->orders()->paginate(15);

        return view('user-orders', compact('userOrders'));
    }
}
