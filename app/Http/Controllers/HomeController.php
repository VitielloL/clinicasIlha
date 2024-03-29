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
        $dados = Consulta::all();

        foreach ($dados as $dado) {
            // Convertendo a data para o formato brasileiro
            $dado->data_consulta = Carbon::parse($dado->data_consulta)->format('d/m/Y');
        }

        return view('home.index', compact('dados'));
    }
}
