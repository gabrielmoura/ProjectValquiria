<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Class AjaxController
 * @package App\Http\Controllers
 */
class AjaxController extends Controller
{


    /**
     * Retorna Todas as Rotas
     * @return \Illuminate\Routing\RouteCollectionInterface
     */
    public function routes()
    {
        $this->middleware('role_or_permission:admin');
        return Route::getRoutes();
    }

    public function getCep(Request $request)
    {
        $this->validate($request, ['cep' => 'min:6|max:9']);
        $cep = $request->cep;
        return \Cache::rememberForever('cep:' . $request->cep, function () use ($cep) {
            return \Correios::cep($cep);
        });
    }

    public function getFrete()
    {
        $dados = [
            'tipo' => 'sedex', // Separar opções por vírgula (,) caso queira consultar mais de um (1) serviço. > Opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
            'formato' => 'caixa', // opções: `caixa`, `rolo`, `envelope`
            //'cep_destino'       => '89062086', // Obrigatório
            'cep_origem' => '21050755', // Obrigatorio
            //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
            //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
            'peso' => '1', // Peso em kilos
            'comprimento' => '16', // Em centímetros
            'altura' => '11', // Em centímetros
            'largura' => '11', // Em centímetros
            'diametro' => '0', // Em centímetros, no caso de rolo
            // 'mao_propria'       => '1', // Náo obrigatórios
            // 'valor_declarado'   => '1', // Náo obrigatórios
            // 'aviso_recebimento' => '1', // Náo obrigatórios
        ];
        $dados = array_merge($dados, ['cep_destino' => request('cep_destino')]);
        $tracking = \Correios::frete($dados);

        return response()->json($tracking);
    }

    public function addFrete()
    {
        $cart = \Cart::session(session()->get('cartID'));
        $cart->add([
            'id' => 'Frete',
            'name' => 'Frete: ' . \request('logradouro'),
            'price' => \request('price'),
            'quantity' => 1,
            'attributes' => array(),
            //'associatedModel' => $Product
        ]);
        return response()->json();
    }
}
