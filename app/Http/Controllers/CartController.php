<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        if (!session()->has('cartID')) {
            session()->put('cartID', session()->getId());
        }
    }

    public function index()
    {
        $cart = \Cart::session(session()->get('cartID'))->getContent();
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $data = $request->get('product');
        $Product = Product::whereSlug($data['slug'])->first();

        if (!$Product->count() || $data['amount'] <= 0) //Não havendo produto ou qualtidade;
            return redirect()->route('home');

        $cart = \Cart::session(session()->get('cartID'));
        $products = $cart->getContent()->toArray();

        if ($cart->isEmpty()) {
            if (in_array($data['slug'], $products)) {
                $cart->add(['id' => $Product->slug,
                    'name' => $Product->name,
                    'price' => $Product->price,
                    'quantity' => $data['amount'],
                    'attributes' => array(),
                    'associatedModel' => $Product]);
            } else {
                $cart->add(['id' => $Product->slug,
                    'name' => $Product->name,
                    'price' => $Product->price,
                    'quantity' => $data['amount'],
                    'attributes' => array(),
                    'associatedModel' => $Product]);
            }
        } else {
            $cart->add([
                'id' => $Product->slug,
                'name' => $Product->name,
                'price' => $Product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $Product
            ]);
        }
        return redirect()->route('product.single', ['slug' => $Product['slug']])
            ->with(['success' => 'Produto Adicionado no carrinho!']);
    }

    public function remove($slug)
    {
        $cart = \Cart::session(session()->get('cartID'));
        $cart->remove($slug);
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        $cart = \Cart::session(session()->get('cartID'));
        $cart->clear();

        return redirect()->route('cart.index')
            ->with(['success' => 'Desistência da compra realizada com sucesso!']);
    }


}
