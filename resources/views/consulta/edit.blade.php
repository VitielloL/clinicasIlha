@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
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
                <div class="col-md-5">
                    <label class="form-label" for="profissional">Profissional: </label>
                    <select class="custom-select custom-select-md mb-3" name="profissional" id="profissional" required>
                        @foreach ($dados['profissional'] as $profissional)
                            <option value="{{ $profissional->id }}" {{ $consulta->profissional_id == $profissional->id ? 'selected' : '' }}>{{ $profissional->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="cliente">Cliente: </label>
                    <select class="custom-select custom-select-md mb-3" name="cliente" id="cliente" required>
                        @foreach ($dados['cliente'] as $cliente)
                            <option value="{{ $cliente->id }}" {{ $consulta->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-3">
                    <label class="form-label" for="celular">CID: </label>
                    <input type="text" class="form-control" id="cid" name="cid" value="{{$consulta->cid}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cpf">Profissional Frequência: </label>
                    <input type="text" class="form-control" id="prof_frequencia" name="prof_frequencia" value="{{$consulta->prof_frequencia}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cpf">Paciente Frequência: </label>
                    <input type="text" class="form-control" id="paciente_frequencia" name="paciente_frequencia" value="{{$consulta->paciente_frequencia}}">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="especialidade">Especialidade</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{$consulta->especialidade}}">
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-md-3">
                    <label class="form-label" for="plano">Plano: </label>
                    <input type="text" class="form-control" id="plano" name="plano" value="{{$consulta->plano}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="nivel">Nivel: </label>
                    <input type="text" class="form-control" id="nivel" name="nivel" value="{{$consulta->nivel}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="dia_semana">Dia da Semana: </label>
                    <input type="text" class="form-control" id="dia_semana" name="dia_semana" value="{{$consulta->dia_semana}}">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="data_consulta">Data da Consulta</label>
                    <input type="text" class="form-control" id="data_consulta" name="data_consulta" value="{{$consulta->data_consulta}}">
                </div>
            </div>

            <div class="mt-4 text-left">
                <button type="submit" class="btn btn-success text-white">Salvar</button>
                <a href="{{route('cliente')}}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
@endsection

@vite(['resources/js/jqueryMask-cep-pessoa.js'])