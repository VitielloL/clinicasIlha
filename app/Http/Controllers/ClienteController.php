<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $dados = Cliente::all();
        return view('cliente.index')->with('dados', $dados);
    }

    public function show($id)
    {
        $dado = Cliente::where('id', $id)->get();
        if (!empty($dado)) {
            return view('cliente.show')->with('dado', $dado);
        } else {
            return redirect()->route('cliente');
        }
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        Cliente::create($dados);
        return redirect()->route('cliente');
    }

    public function edit($id)
    {
        $dado = Cliente::where('id',$id)->get()->first();
        if(!empty($dado)){
            return view('cliente.edit')->with('dado',$dado);
        } else {
            return redirect()->route('cliente');
        }
    }

    public function update(Request $request, $id)
    {
        $dado = Cliente::find($id);

        $dado->cpf = $request->cpf;
        $dado->nome = $request->nome;
        $dado->email = $request->email;
        $dado->celular = $request->celular;
        $dado->cep = $request->cep;
        $dado->bairro = $request->bairro;
        $dado->logradouro = $request->logradouro;
        $dado->numero = $request->numero;
        $dado->complemento = $request->complemento;
        $dado->cidade = $request->cidade;
        $dado->uf = $request->uf;

        $dado->save();
        return redirect()->route('cliente');
    }

    public function destroy($id)
    {
        $dado = Cliente::where('id', $id)->get();
        if (!empty($dado)) {
            DB::delete('DELETE FROM cliente WHERE id = ?', [$id]);
        }
        return redirect()->route('cliente');
    }   
}