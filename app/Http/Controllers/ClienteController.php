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
        // Validação dos campos
        $request->validate([
            'cpf' => 'required|unique:clientes,cpf',
            // Adicione outras regras de validação conforme necessário para os outros campos
        ], [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            // Adicione mensagens de erro para as outras regras de validação conforme necessário
        ]);
    
        // Se a validação passar, prosseguir com o armazenamento dos dados
        $dados = $request->all();
        Cliente::create($dados);
    
        // Redirecionar de volta à página de clientes após o cadastro
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
            DB::delete('DELETE FROM clientes WHERE id = ?', [$id]);
        }
        return redirect()->route('cliente');
    }   
}