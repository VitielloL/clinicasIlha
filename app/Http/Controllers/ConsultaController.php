<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Cliente;
use App\Models\Profissional;

class ConsultaController extends Controller
{
    public function index()
    {
        $dados = Consulta::all();
        return view('consulta.index')->with('dados', $dados);
    }

    public function show($id)
    {
        $dado = Consulta::where('id', $id)->get();
        if (!empty($dado)) {
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
            'prof_frequencia' => 'nullable',
            'paciente_frequencia' => 'nullable',
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
        $consulta->prof_frequencia = $request->prof_frequencia;
        $consulta->paciente_frequencia = $request->paciente_frequencia;
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
            'prof_frequencia' => 'nullable',
            'paciente_frequencia' => 'nullable',
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
            $consulta->prof_frequencia = $request->prof_frequencia;
            $consulta->paciente_frequencia = $request->paciente_frequencia;
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
