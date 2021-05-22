<?php


namespace App\Abstraction;


use Blx32\LaravelPagHiper\TransactionsPagHiper;

class PagHiper
{
    public function create(array $item, string $payer_name, string $payer_email, int $payer_doc, $order_id = 'AAA-123')
    {


        $pag = new \WebMaster\PagHiper\PagHiper(config('paghiper.api_key'), config('paghiper.token'), 'api');
        $dataBillet = [
            'order_id' => '1234',
            'payer_name' => 'Gabriel Moura',
            'payer_email' => 'gabriel.blx32@gmail.com',
            'payer_cpf_cnpj' => '14068743703',
            'type_bank_slip' => config('paghiper.type_bank_slip'),
            'days_due_date' => config('paghiper.days_due_date'),
            'items' => $item
        ];
        $data = $pag->billet()->create($dataBillet);
        if ($data->http_code == 201) {
            $this->registrarTransacion($data);
        }

    }

    protected function registrarTransacion(array $data)
    {

        $result = TransactionsPagHiper::create($data);

        ["result" => "success",
            "response_message" => "transacao criada",
            "transaction_id" => "BAY62Y6TOX01LB6W",
            "created_date" => "2021-02-09 23:25:36",
            "value_cents" => "300",
            "status" => "pending",
            "order_id" => "1234",
            "due_date" => "2021-02-12",
            "bank_slip" => [
                "digitable_line" => "23793.39126 60004.027979 82000.685709 1 85290000000300",
                "url_slip" => "https://www.paghiper.com/checkout/boleto/65e6a396faee4a59049d55e813875d7fe78dc792703b2014d8026f096c3a9a987027efa0a84e783ff2010640d30266f4c8fd41ee503895a45132020f99ea7566/BAY62Y6TOX01LB6W/40279782",
                "url_slip_pdf" => "https://www.paghiper.com/checkout/boleto/65e6a396faee4a59049d55e813875d7fe78dc792703b2014d8026f096c3a9a987027efa0a84e783ff2010640d30266f4c8fd41ee503895a45132020f99ea7566/BAY62Y6TOX01LB6W/40279782/pdf",
                "bar_code_number_to_image" => "23791852900000003003391260004027978200068570"
            ],
            "http_code" => 201,
            "http_cod" => 201
        ];
    }

    public function check()
    {
    }
}
