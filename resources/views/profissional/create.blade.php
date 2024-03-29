@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        <h2 style="margin-bottom: 15px; padding-top:15px;"> Novo Profissional </h2>

        <form action='{{route('profissional.store')}}' method="POST">
            @csrf

            <p class="text-center bg-info text-white fw-bold">Dados Cadastrais</p>

            <div class="form-group row">
                <div class="col-md-6">
                    <label class="form-label" for="nome">Nome:</label>
                    <input type="text" class="form-control"  id="nome" name="nome" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">Email: </label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label class="form-label" for="celular">Celular: </label>
                    <input type="text" class="form-control FLDSTRREQ_celular" id="celular" name="celular" minlength="9" maxlength="16">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="cpf">CPF: </label>
                    <input type="text" class="form-control FLDSTRREQ_cpf" id="cpf" name="cpf" minlength="11" maxlength="16" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="especializacao">Especialidade: </label>
                    <input type="text" class="form-control" id="especializacao" name="especializacao" required >
                </div>
            </div>

            <p class="text-center bg-info text-white fw-bold">Dados Residênciais</p>

            <div class="form-group row">
                <div class="col-md-2">
                    <label class="form-label" for="cep">CEP: </label>
                    <input type="text" class="form-control FLDSTROPT_cep" id="cep" name="cep" minlength="7" maxlength="12" >
                </div>
                <div class="col-md-1">
                    <label class="form-label" for="uf">UF: </label>
                    <input type="text" class="form-control" id="uf" name="uf" minlength="2" maxlength="2">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="cidade">Cidade: </label>
                    <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="bairro">Bairro: </label>
                    <input type="text" class="form-control" id="bairro"  name="bairro">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label class="form-label" for="logradouro">Logradouro: </label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro">
                </div>
                <div class="col-md-1">
                    <label class="form-label" for="numero">Nº: </label>
                    <input type="text" class="form-control" id="numero" name="numero">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="complemento">Complemento: </label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
            </div>

            <div class="mt-4">
                <button type ="submit "class="btn btn-success">Cadastrar</button>
                <a href="{{route('profissional')}}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@vite(['resources/js/jqueryMask-cep-pessoa.js'])