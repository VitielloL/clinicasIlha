<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Consulta;

class HomeController extends Controller
{
    public function index()
    {
        // Definindo o fuso horário para São Paulo (Brasília)
        date_default_timezone_set('America/Sao_Paulo');

        // Obtém a data atual no fuso horário do servidor
        $dataAtual = Carbon::now()->format('Y-m-d');

        // Consulta apenas as consultas do dia de hoje
        $dados = Consulta::whereDate('data_consulta', $dataAtual)->get();

        foreach ($dados as $dado) {
            // Convertendo a data para o formato brasileiro
            $dado->data_consulta = Carbon::parse($dado->data_consulta)->format('d/m/Y');
        }

        return view('home.index', compact('dados'));
    }
}
