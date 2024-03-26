@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        @if (!empty($dado))
            @foreach ( $dado as $d )
                <div class="d-flex">
                    <h2 class="fw-bold text-uppercase" style="margin-bottom: 15px; padding-top:15px;">{{$d->nome}}</h2>
                </div>

                <p class="text-center bg-info text-white fw-bold">Dados da Consulta</p>

                <div class="form-group row">                    
                    <div class="col-md-1">
                        <label class="form-label" for="cidade">Sala: </label>
                        <input type="text" class="form-control" id="sala" value="{{$d->sala}}" disabled>
                    </div>
                    <div class="col-md-1">
                        <label class="form-label" for="cidade">Horario: </label>
                        <input type="text" class="form-control" id="horario" value="{{$d->horario}}" disabled>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" for="cidade">Profissional: </label>
                        <input type="text" class="form-control" id="profissional" value="{{$d->profissional->nome}}" disabled>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" for="cidade">Cliente: </label>
                        <input type="text" class="form-control" id="cliente" value="{{$d->cliente->nome}}" disabled>
                    </div>
                </div>

                <div class="form-group row mt-4">                    
                    <div class="col-md-3">
                        <label class="form-label" for="cidade">CID: </label>
                        <input type="text" class="form-control" id="cid" value="{{$d->cid}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="cidade">Profissional Frequência: </label>
                        <input type="text" class="form-control" id="prof_frequencia" value="{{$d->prof_frequencia}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="cidade">Paciente Frequência: </label>
                        <input type="text" class="form-control" id="paciente_frequencia" value="{{$d->paciente_frequencia}}" disabled>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" for="cidade">Especialidade:</label>
                        <input type="text" class="form-control" id="especialidade" value="{{$d->especialidade}}" disabled>
                    </div>
                </div>

                <div class="form-group row mt-4">                    
                    <div class="col-md-3">
                        <label class="form-label" for="cidade">Plano:</label>
                        <input type="text" class="form-control" id="plano" value="{{$d->plano}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="cidade">Nivel:</label>
                        <input type="text" class="form-control" id="nivel" value="{{$d->nivel}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="cidade">Dia da Semana: </label>
                        <input type="text" class="form-control" id="dia_semana" value="{{$d->dia_semana}}" disabled>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" for="cidade">Data da Consulta: </label>
                        <input type="text" class="form-control" id="data_consulta" value="{{$d->data_consulta}}" disabled>
                    </div>
                </div>

                <div class="mt-4 text-left">
                    <a href="{{route('consulta')}}" class="btn btn-secondary">Voltar</a>
                </div>
            @endforeach
        @endif
    </div>
@endsection