@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        <h2 style="margin-bottom: 15px; padding-top:15px;"> Novo Agendamento </h2>

        <form action='{{route('consulta.store')}}' method="POST">
            @csrf

            <p class="text-center bg-info text-white fw-bold">Dados da Consulta</p>

            <div class="form-group row">
                <div class="col-md-1">
                    <label class="form-label" for="sala">Sala:</label>
                    <input type="text" class="form-control"  id="sala" name="sala" required>
                </div>
                <div class="col-md-1">
                    <label class="form-label" for="horario">Horário: </label>
                    <input type="text" class="form-control" id="horario" name="horario" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="profissional">Profissional: </label>
                    <select class="custom-select custom-select-md mb-3" name="profissional" id="profissional" required>
                        @foreach ( $dados['profissional'] as $dado )
                          <option value="{{$dado->id}}">{{$dado->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="cliente">Cliente: </label>
                    <select class="custom-select custom-select-md mb-3" name="cliente" id="cliente" required>
                        @foreach ( $dados['cliente'] as $dado )
                          <option value="{{$dado->id}}">{{$dado->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-3">
                    <label class="form-label" for="celular">CID: </label>
                    <input type="text" class="form-control" id="cid" name="cid">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cpf">Profissional Frequência: </label>
                    <input type="text" class="form-control" id="prof_frequencia" name="prof_frequencia">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cpf">Paciente Frequência: </label>
                    <input type="text" class="form-control" id="paciente_frequencia" name="paciente_frequencia">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="especialidade">Especialidade</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade">
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-3">
                    <label class="form-label" for="plano">Plano: </label>
                    <input type="text" class="form-control" id="plano" name="plano">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="nivel">Nivel: </label>
                    <input type="text" class="form-control" id="nivel" name="nivel">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="dia_semana">Dia da Semana: </label>
                    <input type="text" class="form-control" id="dia_semana" name="dia_semana">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="data_consulta">Data da Consulta</label>
                    <input type="text" class="form-control" id="data_consulta" name="data_consulta">
                </div>
            </div>

            <div class="mt-4">
                <button type ="submit "class="btn btn-success">Cadastrar</button>
                <a href="{{route('cliente')}}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection