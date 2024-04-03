@extends('layout.nav')

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
            <div style="margin-bottom:15px; padding-top:15px; display:flex; justify-content:space-between; align-items:center">
                <h2>Agenda de Consultas</h2>
                <a href='{{route('consulta.novo')}}' class='btn btn-success' style="height: 40px;"><i class="far fa-calendar-check"></i> &nbsp Agendar</a>
            </div>

            @if (!empty($dados))
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-full-width">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th>Sala</th>
                            <th>Horário</th>
                            <th>Profissional</th>
                            <th>Paciente</th>
                            <th>Dia da Semana</th>
                            <th>Data da Consulta</th>
                            <th>Frequência</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $consulta)
                        @php
                        $linkReadMore = url('/consulta/' . $consulta->id);
                        $linkEditItem = url ('/consulta/editar/' . $consulta->id);
                        $linkRemoveItem = url ('/consulta/remover/' . $consulta->id);
                        @endphp
                        <tr>
                            <td style="vertical-align:middle">{{$consulta->sala}}</td>
                            <td style="vertical-align:middle">{{$consulta->horario}}</td>
                            <td style="vertical-align:middle">{{$consulta->profissional->nome}}</td>
                            <td style="vertical-align:middle">{{$consulta->cliente->nome}}</td>
                            <td style="vertical-align:middle">{{$consulta->dia_semana}}</td>
                            <td style="vertical-align:middle">{{$consulta->data_consulta}}</td>
                            <td style="vertical-align:middle">
                                <form action="{{ route('consulta.atualizar-frequencia', ['consulta' => $consulta->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex">
                                        <select class="form-control" name="frequencia" required>
                                            <option value="Agendado" {{ $consulta->frequencia == 'Agendado' ? 'selected' : '' }}>Agendado</option>
                                            <option value="Presente" {{ $consulta->frequencia == 'Presente' ? 'selected' : '' }}>Presente</option>
                                            <option value="Falta" {{ $consulta->frequencia == 'Falta' ? 'selected' : '' }}>Falta</option>
                                            <option value="Falta Justificada" {{ $consulta->frequencia == 'Falta Justificada' ? 'selected' : '' }}>Falta Justificada</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href={{$linkReadMore}} class="btn btn-info mr-2"><i class="fa fa-eye mr-1 mb-0" aria-hidden="true"></i> Ver Mais</a>
                                    <a href={{$linkEditItem}} class="btn btn-warning mr-2" style="color:white"><i class="fa fa-pen mr-1 mb-0" aria-hidden="true"></i>Editar</a>
                                    <a href={{$linkRemoveItem}} class="btn btn-danger mr-2"><i class="fa fa-trash mr-1 mb-0" aria-hidden="true"></i>Excluir</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection