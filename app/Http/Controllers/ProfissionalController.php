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
        // Recuperar todos os profissionais ordenados pelo nome
        $dados = Profissional::orderBy('nome')->paginate(10);
        
        // Retornar a view com os dados
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

    public function buscar(Request $request)
    {
        // Verificar se houve algum parâmetro de busca enviado
        if ($request->filled('nome') || $request->filled('cpf')) {
            $nome = $request->input('nome');
            $cpf = $request->input('cpf');
            // Aplicar a lógica de filtro conforme necessário
            $dados = Profissional::where(function ($query) use ($nome, $cpf) {
                if ($nome) {
                    $query->where('nome', 'like', '%' . $nome . '%');
                }
                if ($cpf) {
                    $query->orWhere('cpf', 'like', '%' . $cpf . '%');
                }
            })->paginate(10); // Substituir get() por paginate(10)
        } else {
            // Se nenhum parâmetro de busca foi fornecido, recuperar todos os dados paginados
            $dados = Profissional::paginate(10); // Paginar os dados
        }
    
        // Retornar a view com os dados
        return view('profissional.index')->with('dados', $dados);
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
