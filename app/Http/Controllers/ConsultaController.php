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

        return view('consulta.create')->with('dados', $dados);
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        Consulta::create($dados);
        return redirect()->route('consulta');
    }

    public function edit($id)
    {
        $dado = Consulta::where('id',$id)->get()->first();
        if(!empty($dado)){
            return view('consulta.edit')->with('dado',$dado);
        } else {
            return redirect()->route('consulta');
        }
    }

    public function update(Request $request, $id)
    {
        $dado = Consulta::find($id);

        $dado->client_id = $request->client_id;
        $dado->forma_pagamento = $request->forma_pagamento;
        $dado->total_venda = $request->total_venda;

        $dado->save();
        return redirect()->route('consulta');
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
