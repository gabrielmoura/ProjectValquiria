<?php

namespace App\Http\Controllers;

use App\Models\UserOrder;
use App\Payment\PagSeguro\Notification;
use App\Traits\PagSeguroTrait;
use Cart;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use PagSeguro;

class CheckoutController extends Controller
{
    use PagSeguroTrait;

    public function index()
    {
        if (!auth()->check()) return redirect()->route('login')->with(['route' => 'checkout.index']);
        if (!session()->has('cartID')) return redirect()->route('cart.index');
    }

    public function pay()
    {
        if (!auth()->check()) return redirect()->route('login')->with(['route' => 'checkout.index']);
        if (!session()->has('cartID')) return redirect()->route('cart.index');
        $cart = Cart::session(session()->get('cartID'));
        $this->makePagSeguroSession();
        $cartItems = $cart->getContent()->toArray();
        return view('checkout', compact('cartItems'));
    }

    public function pay2()
    {
        if (!auth()->check()) return redirect()->route('login')->with(['route' => 'checkout.index']);
        if (!session()->has('cartID')) return redirect()->route('cart.index');
        $cart = Cart::session(session()->get('cartID'));
        $this->makePagSeguroSession();
        $cartItems = $cart->getTotal();
        return view('blank', compact('cartItems'));
    }

    public function process(Request $request)
    {
        $boleto = ['paymentMethod' => 'boleto'];
        $cCard = ['paymentMethod' => 'creditCard',
            'creditCardToken' => 'Vem do Javascript',
            'installmentQuantity' => '2',
            'installmentValue' => 50.20,];
        try {
            $dataPost = $request->all();
            $user = auth()->user();
            $cartItems = session()->get('cart');
            $reference = Uuid::uuid(); //Referencia BD

            $pagseguro = PagSeguro::setReference('2')
                ->setSenderInfo([
                    'senderName' => 'Nome Completo', //Deve conter nome e sobrenome
                    'senderPhone' => '(32) 1324-1421', //Código de área enviado junto com o telefone
                    'senderEmail' => 'email@email.com',
                    'senderHash' => 'Hash gerado pelo javascript',
                    'senderCNPJ' => '98.966.488/0001-00' //Ou CPF se for Pessoa Física
                ])
                ->setShippingAddress([
                    'shippingAddressStreet' => 'Rua/Avenida',
                    'shippingAddressNumber' => 'Número',
                    'shippingAddressDistrict' => 'Bairro',
                    'shippingAddressPostalCode' => '12345-678',
                    'shippingAddressCity' => 'Cidade',
                    'shippingAddressState' => 'UF'
                ])
                ->setItems([
                    [
                        'itemId' => 'ID',
                        'itemDescription' => 'Nome do Item',
                        'itemAmount' => 12.14, //Valor unitário
                        'itemQuantity' => '2', // Quantidade de itens
                    ],
                    [
                        'itemId' => 'ID 2',
                        'itemDescription' => 'Nome do Item 2',
                        'itemAmount' => 12.14,
                        'itemQuantity' => '2',
                    ]
                ])
                ->send($boleto);
        } catch (\Artistas\PagSeguro\PagSeguroException $e) {
            $e->getCode(); //codigo do erro
            $e->getMessage(); //mensagem do erro
        }
    }

    private function makePagSeguroSession()
    {
        if (!session()->has('pagseguro_session_code')) {

            return session()->put('pagseguro_session_code', \PagSeguro::startSession());
        }
        return null;
    }

    public function notification(Request $request)
    {
        try {
            $result = PagSeguro::notification($request->notificationCode, $request->notificationType); // Ou PagSeguroRecorrente

            $reference = $result->reference->__toString();
            $userOrder = UserOrder::whereReference($reference);
            $userOrder->update([
                'pagseguro_status' => $result->status->__toString(),
            ]);

            if ($result->status->__toString() == 3) {
                // Liberar o pedido do usuário..., atualizar o status do pedido para em separação
                //Notificar o usuário que o pedido foi pago...
                //Notificar a loja da confirmação do pedido...
            }

            return response()->json([], 204);

        } catch (\Exception $e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : '';

            return response()->json(['error' => $message], 500);
        }
    }

}
