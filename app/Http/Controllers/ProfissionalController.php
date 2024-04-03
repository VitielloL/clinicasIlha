<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profissional;
use Illuminate\Validation\Rule;

class ProfissionalController extends Controller
{
    public function index()
    {
        $dados = Profissional::all();
        return view('profissional.index')->with('dados', $dados);
    }

    public function show($id)
    {
        $dado = Profissional::where('id', $id)->get();
        if (!empty($dado)) {
            return view('profissional.show')->with('dado', $dado);
        } else {
            return redirect()->route('profissional');
        }
    }

    public function create()
    {
        return view('profissional.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'cpf' => 'required|unique:profissionais,cpf',
            // Adicione outras regras de validação conforme necessário para os outros campos
        ], [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            // Adicione mensagens de erro para as outras regras de validação conforme necessário
        ]);
    
        // Se a validação passar, prosseguir com o armazenamento dos dados
        $dados = $request->all();
        Profissional::create($dados);
    
        // Redirecionar de volta à página de profissionais após o cadastro
        return redirect()->route('profissional');
    }

    public function edit($id)
    {
        $dado = Profissional::where('id',$id)->get()->first();
        if(!empty($dado)){
            return view('profissional.edit')->with('dado',$dado);
        } else {
            return redirect()->route('profissional');
        }
    }

    public function update(Request $request, $id)
    {
        $dado = Profissional::find($id);
    
        // Validação do CPF
        $request->validate([
            'cpf' => ['required', Rule::unique('profissionais', 'cpf')->ignore($dado->id)],
            // Adicione outras regras de validação conforme necessário para os outros campos
        ], [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            // Adicione mensagens de erro para as outras regras de validação conforme necessário
        ]);
    
        // Se a validação passar, atualize os dados do profissional
        $dado->cpf = $request->cpf;
        $dado->nome = $request->nome;
        $dado->especializacao = $request->especializacao;
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
        return redirect()->route('profissional');
    }

    public function destroy($id)
    {
        $dado = Profissional::where('id', $id)->get();
        if (!empty($dado)) {
            DB::delete('DELETE FROM profissionais WHERE id = ?', [$id]);
        }
        return redirect()->route('profissional');
    }   
}
