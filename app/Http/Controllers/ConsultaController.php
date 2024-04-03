<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Cliente;
use App\Models\Profissional;

class ConsultaController extends Controller
{
    public function index()
    {
        // Recuperar todos os clientes ordenados pelo nome
        $dados = Consulta::orderBy('data_consulta')->paginate(10);
        
        foreach ($dados as $dado) {
            // Convertendo a data para o formato brasileiro
            $dado->data_consulta = Carbon::parse($dado->data_consulta)->format('d/m/Y');
        }

        // Retornar a view com os dados
        return view('consulta.index')->with('dados', $dados);
    }

    public function buscar(Request $request)
    {
        // Verificar se houve algum parâmetro de busca enviado
        if ($request->filled('nome_profissional') || $request->filled('nome_cliente') || $request->filled('dia_semana') || $request->filled('data_consulta') || $request->filled('frequencia')) {
            $nomeProfissional = $request->input('nome_profissional');
            $frequencia = $request->input('frequencia');
            $nomeCliente = $request->input('nome_cliente');
            $diaSemana = $request->input('dia_semana');
            $dataConsulta = $request->input('data_consulta');
    
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

            if ($diaSemana) {
                $query->where('dia_semana', $diaSemana);
            }
    
            if ($dataConsulta) {
                $query->where('data_consulta', $dataConsulta);
            }
    
            $dados = $query->paginate(10); // Paginar os dados
    
            // Formatando a data para exibição na view
            foreach ($dados as $consulta) {
                $consulta->data_consulta = Carbon::parse($consulta->data_consulta)->format('d/m/Y');
            }
        } else {
            // Se nenhum parâmetro de busca foi fornecido, recuperar todos os dados paginados
            $dados = Consulta::paginate(10); // Paginar os dados
        }
    
        // Retornar a view com os dados
        return view('consulta.index')->with('dados', $dados);
    }
    
    public function atualizarFrequencia(Request $request, Consulta $consulta)
    {
        $consulta->update(['frequencia' => $request->input('frequencia')]);
    
        return redirect()->back()->with('success', 'Frequência atualizada com sucesso');
    }
    
    public function show($id)
    {
        $dado = Consulta::where('id', $id)->get();
        if (!empty($dado)) {
            // Convertendo a data para o formato brasileiro
            foreach ($dado as $consulta) {
                $consulta->data_consulta = Carbon::parse($consulta->data_consulta)->format('d/m/Y');
            }
            return view('consulta.show')->with('dado', $dado);
        } else {
            return redirect()->route('consulta');
        }
    }

    public function create()
    {   
        $dados['cliente'] = Cliente::all();
        $dados['profissional'] = Profissional::all();

        //return view('consulta.create')->with('dados', $dados);
        return view('consulta.create', compact('dados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sala' => 'required',
            'horario' => 'required',
            'profissional' => 'required',
            'cliente' => 'required',
            'cid' => 'nullable',
            'frequencia' => 'nullable',
            'especialidade' => 'nullable',
            'plano' => 'nullable',
            'nivel' => 'nullable',
            'dia_semana' => 'nullable',
            'data_consulta' => 'nullable',
        ]);

        $consulta = new Consulta();
        $consulta->sala = $request->sala;
        $consulta->horario = $request->horario;
        $consulta->profissional_id = $request->profissional;
        $consulta->cliente_id = $request->cliente;
        $consulta->cid = $request->cid;
        $consulta->frequencia = $request->frequencia;
        $consulta->especialidade = $request->especialidade;
        $consulta->plano = $request->plano;
        $consulta->nivel = $request->nivel;
        $consulta->dia_semana = $request->dia_semana;
        $consulta->data_consulta = $request->data_consulta;

        $consulta->save();
        return redirect()->route('consulta')->with('success', 'Consulta criada com sucesso!');
    }

    public function edit($id)
    {
        $consulta = Consulta::find($id);
    
        if ($consulta) {
            $dados['cliente'] = Cliente::all();
            $dados['profissional'] = Profissional::all();
            
            return view('consulta.edit', compact('consulta', 'dados'));
        } else {
            return redirect()->route('consulta')->with('error', 'Consulta não encontrada.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sala' => 'required',
            'horario' => 'required',
            'profissional' => 'required',
            'cliente' => 'required',
            'cid' => 'nullable',
            'frequencia' => 'nullable',
            'especialidade' => 'nullable',
            'plano' => 'nullable',
            'nivel' => 'nullable',
            'dia_semana' => 'nullable',
            'data_consulta' => 'nullable',
        ]);
    
        $consulta = Consulta::find($id);
    
        if ($consulta) {
            $consulta->sala = $request->sala;
            $consulta->horario = $request->horario;
            $consulta->profissional_id = $request->profissional;
            $consulta->cliente_id = $request->cliente;
            $consulta->cid = $request->cid;
            $consulta->frequencia = $request->frequencia;
            $consulta->especialidade = $request->especialidade;
            $consulta->plano = $request->plano;
            $consulta->nivel = $request->nivel;
            $consulta->dia_semana = $request->dia_semana;
            $consulta->data_consulta = $request->data_consulta;
    
            $consulta->save();
            return redirect()->route('consulta')->with('success', 'Consulta atualizada com sucesso!');
        } else {
            return redirect()->route('consulta')->with('error', 'Consulta não encontrada.');
        }
    }

    public function destroy($id)
    {
        $dado = Consulta::where('id', $id)->get();
        if (!empty($dado)) {
            DB::delete('DELETE FROM consultas WHERE id = ?', [$id]);
        }
        return redirect()->route('consulta');
    }
}
