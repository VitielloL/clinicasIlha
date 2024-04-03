<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index()
    {
        // Recuperar todos os clientes ordenados pelo nome
        $dados = Cliente::orderBy('nome')->paginate(10);
        
        // Retornar a view com os dados
        return view('cliente.index')->with('dados', $dados);
    }

    public function buscar(Request $request)
    {
        // Verificar se houve algum parâmetro de busca enviado
        if ($request->filled('nome') || $request->filled('cpf')) {
            $nome = $request->input('nome');
            $cpf = $request->input('cpf');
            // Aplicar a lógica de filtro conforme necessário
            $dados = Cliente::where(function ($query) use ($nome, $cpf) {
                if ($nome) {
                    $query->where('nome', 'like', '%' . $nome . '%');
                }
                if ($cpf) {
                    $query->orWhere('cpf', 'like', '%' . $cpf . '%');
                }
            })->paginate(10); // Substituir get() por paginate(10)
        } else {
            // Se nenhum parâmetro de busca foi fornecido, recuperar todos os dados paginados
            $dados = Cliente::paginate(10); // Paginar os dados
        }
    
        // Retornar a view com os dados
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
    
        // Validação do CPF
        $request->validate([
            'cpf' => ['required', Rule::unique('clientes', 'cpf')->ignore($dado->id)],
            // Adicione outras regras de validação conforme necessário para os outros campos
        ], [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            // Adicione mensagens de erro para as outras regras de validação conforme necessário
        ]);

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