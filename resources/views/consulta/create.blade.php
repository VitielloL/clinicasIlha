@extends('layout.nav')

@section('conteudo')
    <div class="container-fluid my-4">
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
                <div class="col-md-4">
                    <label class="form-label" for="profissional">Profissional: </label>
                    <select class="profissional custom-select custom-select-md mb-3" name="profissional" id="profissional" required>
                        <option value="" selected disabled>Selecione um profissional</option>
                        @foreach ( $dados['profissional'] as $dado )
                          <option value="{{$dado->id}}">{{$dado->nome}} - {{$dado->cpf}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="cliente">Paciente: </label>
                    <select class="cliente custom-select custom-select-md mb-3" name="cliente" id="cliente" required>
                        <option value="" selected disabled>Selecione um paciente</option>
                        @foreach ( $dados['cliente'] as $dado )
                          <option value="{{$dado->id}}">{{$dado->nome}} - {{$dado->cpf}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cid">CID: </label>
                    <input type="text" class="form-control" id="cid" name="cid">
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-2">
                    <label class="form-label" for="especialidade">Especialidade</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="frequencia">Frequência:</label>
                    <select class="form-control" id="frequencia" name="frequencia" required>
                        <option value="" selected disabled>Selecione uma opção abaixo</option>
                        <option value="Agendado">Agendado</option>
                        <option value="Lista de Espera">Lista de Espera</option>
                        <option value="Presente">Presente</option>
                        <option value="Falta">Falta</option>
                        <option value="Falta Justificada">Falta Justificada</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="plano">Plano: </label>
                    <input type="text" class="form-control" id="plano" name="plano">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="nivel">Nivel: </label>
                    <input type="text" class="form-control" id="nivel" name="nivel">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="dia_semana">Dia da Semana: </label>
                    <select class="form-control" id="dia_semana" name="dia_semana" required>
                        <option value="" selected disabled>Selecione um dia da semana</option>
                        <option value="Segunda-feira">Segunda-feira</option>
                        <option value="Terça-feira">Terça-feira</option>
                        <option value="Quarta-feira">Quarta-feira</option>
                        <option value="Quinta-feira">Quinta-feira</option>
                        <option value="Sexta-feira">Sexta-feira</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="data_consulta">Data da Consulta</label>
                    <input type="date" class="form-control" id="data_consulta" name="data_consulta" required>
                </div>
            </div>

            <div class="mt-4">
                <button type ="submit "class="btn btn-success">Agendar</button>
                <a href="{{route('consulta')}}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@vite(['resources/js/selected2.js'])