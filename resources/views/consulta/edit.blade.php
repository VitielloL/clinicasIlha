@extends('layout.nav')

@section('conteudo')
    <div class="container-fluid my-4">
        <h2 style="margin-bottom: 15px; padding-top:15px;"> Editar Agendamento </h2>

        <form  action="<?= url('/consulta/update',['id' => $consulta->id]);?>" method="post">
            @csrf
            @method('PUT')

            <p class="text-center bg-info text-white fw-bold">Dados da Consulta</p>
            
            <div class="form-group row">
                <div class="col-md-1">
                    <label class="form-label" for="sala">Sala:</label>
                    <input type="text" class="form-control"  id="sala" name="sala" value="{{$consulta->sala}}">
                </div>
                <div class="col-md-1">
                    <label class="form-label" for="horario">Horário: </label>
                    <input type="text" class="form-control" id="horario" name="horario" value="{{$consulta->horario}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="profissional">Profissional: </label>
                    <select class="profissional custom-select custom-select-md mb-3" name="profissional" id="profissional" required>
                        @foreach ($dados['profissional'] as $profissional)
                            <option value="{{ $profissional->id }}" {{ $consulta->profissional_id == $profissional->id ? 'selected' : '' }}>
                                {{ $profissional->nome }} - {{ $profissional->cpf }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="cliente">Paciente: </label>
                    <select class="cliente custom-select custom-select-md mb-3" name="cliente" id="cliente" required>
                        @foreach ($dados['cliente'] as $cliente)
                            <option value="{{ $cliente->id }}" {{ $consulta->cliente_id == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }} - {{ $cliente->cpf }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="celular">CID: </label>
                    <input type="text" class="form-control" id="cid" name="cid" value="{{$consulta->cid}}">
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-2">
                    <label class="form-label" for="especialidade">Especialidade</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{$consulta->especialidade}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="frequencia">Frequência: </label>
                    <select class="form-control" id="frequencia" name="frequencia">
                        <option value="Agendado" {{$consulta->frequencia == 'Agendado' ? 'selected' : ''}}>Agendado</option>
                        <option value="Lista de Espera" {{$consulta->frequencia == 'Lista de Espera' ? 'selected' : ''}}>Lista de Espera</option>
                        <option value="Presente" {{$consulta->frequenciaa == 'Presente' ? 'selected' : ''}}>Presente</option>
                        <option value="Falta" {{$consulta->frequencia == 'Falta' ? 'selected' : ''}}>Falta</option>
                        <option value="Falta Justificada" {{$consulta->dia_semana == 'Falta Justificada' ? 'selected' : ''}}>Falta Justificada</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="plano">Plano: </label>
                    <input type="text" class="form-control" id="plano" name="plano" value="{{$consulta->plano}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="nivel">Nivel: </label>
                    <input type="text" class="form-control" id="nivel" name="nivel" value="{{$consulta->nivel}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="dia_semana">Dia da Semana: </label>
                    <select class="form-control" id="dia_semana" name="dia_semana">
                        <option value="Segunda-feira" {{$consulta->dia_semana == 'Segunda-feira' ? 'selected' : ''}}>Segunda-feira</option>
                        <option value="Terça-feira" {{$consulta->dia_semana == 'Terça-feira' ? 'selected' : ''}}>Terça-feira</option>
                        <option value="Quarta-feira" {{$consulta->dia_semana == 'Quarta-feira' ? 'selected' : ''}}>Quarta-feira</option>
                        <option value="Quinta-feira" {{$consulta->dia_semana == 'Quinta-feira' ? 'selected' : ''}}>Quinta-feira</option>
                        <option value="Sexta-feira" {{$consulta->dia_semana == 'Sexta-feira' ? 'selected' : ''}}>Sexta-feira</option>
                        <option value="Sábado" {{$consulta->dia_semana == 'Sábado' ? 'selected' : ''}}>Sábado</option>
                        <option value="Domingo" {{$consulta->dia_semana == 'Domingo' ? 'selected' : ''}}>Domingo</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="data_consulta">Data da Consulta</label>
                    <input type="date" class="form-control" id="data_consulta" name="data_consulta" value="{{$consulta->data_consulta}}">
                </div>
            </div>

            <div class="form-group row mt-4">

            </div>

            <div class="mt-4 text-left">
                <button type="submit" class="btn btn-success text-white">Salvar</button>
                <a href="{{route('consulta')}}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
@endsection

@vite(['resources/js/selected2.js'])