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
        $dados = Consulta::whereDate('data_consulta', $dataAtual)->paginate(10);

        // Formatando a data para exibição na view
        foreach ($dados as $consulta) {
            $consulta->data_consulta = Carbon::parse($consulta->data_consulta)->format('d/m/Y');
        }

        return view('home.index', compact('dados'));
    }

    public function buscar(Request $request)
    {
        // Definindo o fuso horário para São Paulo (Brasília)
        date_default_timezone_set('America/Sao_Paulo');
    
        // Obtém a data atual no fuso horário do servidor
        $dataAtual = Carbon::now()->format('Y-m-d');
    
        // Verificar se houve algum parâmetro de busca enviado
        if ($request->filled('nome_profissional') || $request->filled('nome_cliente') || $request->filled('sala') || $request->filled('frequencia')) {
            $nomeProfissional = $request->input('nome_profissional');
            $frequencia = $request->input('frequencia');
            $nomeCliente = $request->input('nome_cliente');
            $sala = $request->input('sala');
    
            // Aplicar a lógica de filtro conforme necessário
            $query = Consulta::query();
    
            if ($nomeProfissional) {
                $query->whereHas('profissional', function ($q) use ($nomeProfissional) {
                    $q->where('nome', 'like', '%' . $nomeProfissional . '%');
                });
            }
    
            if ($nomeCliente) {
                $query->whereHas('cliente', function ($q) use ($nomeCliente) {
                    $q->where('nome', 'like', '%' . $nomeCliente . '%');
                });
            }
    
            if ($frequencia) {
                $query->where('frequencia', $frequencia);
            }

            if ($sala) {
                $query->where('sala', $sala);
            }
    
            $query->whereDate('data_consulta', $dataAtual);
    
            $dados = $query->paginate(10); // Paginar os dados
    
            // Formatando a data para exibição na view
            foreach ($dados as $consulta) {
                $consulta->data_consulta = Carbon::parse($consulta->data_consulta)->format('d/m/Y');
            }
        } else {
            // Se nenhum parâmetro de busca foi fornecido, recuperar todos os dados paginados
            $dados = Consulta::whereDate('data_consulta', $dataAtual)->paginate(10); // Paginar os dados
        }
    
        // Retornar a view com os dados
        return view('home.index')->with('dados', $dados);
    }
    
    public function atualizarFrequencia(Request $request, Consulta $consulta)
    {
        $consulta->update(['frequencia' => $request->input('frequencia')]);
    
        return redirect()->back()->with('success', 'Frequência atualizada com sucesso');
    }
}
