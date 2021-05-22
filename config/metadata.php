<?php
return [
    /**
     * Headers
     * <script type="application/ld+json">
     */
    'header' => [
        '@context' => 'http://schema.org',
        '@type' => 'WebSite',
        'url' => 'ProjetoValquiria.com.br',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => 'https://projetovalquiria.com.br/buscar?search={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ]
    , "author" => 'ProjetoValquiria'
    , "name" => 'ProjetoValquiria'
    , "email" => 'contact@ProjetoValquiria.com.br'
    , "telephone" => '55 21 40028922'
    , "url" => 'ProjetoValquiria.com.br'
    , "theme-color" => '#B99573'
    , "address" => 'Rua Um com Dois, Rio de Janeiro'
];
