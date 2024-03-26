@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        <div style="margin-bottom: 15px; padding-top:15px; display:flex; justify-content:space-between; align-items:center;">
            <h2>Lista de Clientes</h2>
            <a href='{{route('cliente.novo')}}' class='btn btn-success' style="height: 40px;">Cadastrar</a>
        </div>

        @if (!empty($dados))
            <table class="table table-light table-striped">
                <thead class="table-info">
                    <tr>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Email</td>
                        <td>Ações</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $dados as $dado )
                        @php
                            $linkReadMore = url('/cliente/' . $dado->id);
                            $linkEditItem = url ('/cliente/editar/' . $dado->id);
                            $linkRemoveItem = url ('/cliente/remover/' . $dado->id);
                        @endphp

                        <tr>
                            <td style="vertical-align:middle">{{$dado->nome}}</td>
                            <td style="vertical-align:middle">{{$dado->cpf}}</td>
                            <td style="vertical-align:middle">{{$dado->email}}</td>
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