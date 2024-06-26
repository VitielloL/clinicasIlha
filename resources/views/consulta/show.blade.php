@extends('layout.nav')

@section('conteudo')
<div class="container-fluid my-4">
    @if (!empty($dado))
        @foreach ($dado as $d)
            <div class="d-flex">
                <h2 class="fw-bold text-uppercase" style="margin-bottom: 15px; padding-top:15px;">{{$d->nome}}</h2>
            </div>

            <p class="text-center bg-info text-white fw-bold">Dados da Consulta</p>

            <div class="form-group row">                    
                <div class="col-md-1">
                    <label class="form-label" for="sala">Sala:</label>
                    <input type="text" class="form-control" id="sala" value="{{$d->sala}}" disabled>
                </div>
                <div class="col-md-1">
                    <label class="form-label" for="horario">Horário:</label>
                    <input type="text" class="form-control" id="horario" value="{{$d->horario}}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="profissional">Profissional:</label>
                    <input type="text" class="form-control" id="profissional" value="{{$d->profissional->nome}}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="cliente">Cliente:</label>
                    <input type="text" class="form-control" id="cliente" value="{{$d->cliente->nome}}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cid">CID:</label>
                    <input type="text" class="form-control" id="cid" value="{{$d->cid}}" disabled>
                </div>
            </div>

            <div class="form-group row mt-4">                    
                <div class="col-md-2">
                    <label class="form-label" for="especialidade">Especialidade:</label>
                    <input type="text" class="form-control" id="especialidade" value="{{$d->especialidade}}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="frequencia">Frequência:</label>
                    <input type="text" class="form-control" id="frequencia" value="{{$d->frequencia}}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="plano">Plano:</label>
                    <input type="text" class="form-control" id="plano" value="{{$d->plano}}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="nivel">Nível:</label>
                    <input type="text" class="form-control" id="nivel" value="{{$d->nivel}}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="dia_semana">Dia da Semana:</label>
                    <input type="text" class="form-control" id="dia_semana" value="{{$d->dia_semana}}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="data_consulta">Data da Consulta:</label>
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
