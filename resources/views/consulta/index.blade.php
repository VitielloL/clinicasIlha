@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        <div style="margin-bottom:15px; padding-top:15px; display:flex; justify-content:space-between; align-items:center">
            <h2>Agenda de Consultas</h2>
            <a href='{{route('consulta.novo')}}' class='btn btn-success' style="height: 40px;"><i class="far fa-calendar-check"></i> &nbsp Agendar</a>
        </div>

        @if (!empty($dados))
            <table class="table table-light table-striped">
                <thead class="table-info">
                    <tr>
                        <td>Sala</td>
                        <td>Horário</td>
                        <td>Profissional</td>
                        <td>Paciente</td>
                        <td>Dia da Semana</td>
                        <td>Data da Consulta</td>
                        <td>Ações</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $dados as $dado )
                        @php
                            $linkReadMore = url('/consulta/' . $dado->id);
                            $linkEditItem = url ('/consulta/editar/' . $dado->id);
                            $linkRemoveItem = url ('/consulta/remover/' . $dado->id);
                        @endphp
                        <tr>
                            <td style="vertical-align:middle">{{$dado->sala}}</td>
                            <td style="vertical-align:middle">{{$dado->horario}}</td>
                            <td style="vertical-align:middle"><span class="text-success" style="font-weight:bold"></span>{{$dado->profissional->nome}}</td>
                            <td style="vertical-align:middle"><span class="text-success" style="font-weight:bold"></span>{{$dado->cliente->nome}}</td>
                            <td style="vertical-align:middle"><span class="text-success" style="font-weight:bold"></span>{{$dado->dia_semana}}</td>
                            <td style="vertical-align:middle"><span class="text-success" style="font-weight:bold"></span>{{$dado->data_consulta}}</td>
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
        @endif
    </div>
@endsection