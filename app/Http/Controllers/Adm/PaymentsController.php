<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\TransactionsPagHiper;

class PaymentsController extends Controller
{
    public function index()
    {
        $boletos = TransactionsPagHiper::all();
        return view('admin.pay.index', compact('boletos'));
    }
}
