<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Condominios;
use App\Models\Documentos;
use App\Models\Funcionarios;
use App\Models\Moradores;

class AdminController extends Controller
{
    public function widgets()
    {
        return [
            'condominios' => Condominios::all()->count(),
            'moradores' => Moradores::all()->count(),
            'documentos' => Documentos::all()->count(),
            'funcionarios' => Funcionarios::all()->count()
        ];
    }
}
