@extends('layout.nav')

@section('conteudo')
    <div class="container-fluid my-4">
        <div style="margin-bottom: 15px; padding-top:15px; display:flex; justify-content:space-between; align-items:center;">
            <h2>Lista de Pacientes</h2>
            <a href='{{route('cliente.novo')}}' class='btn btn-success' style="height: 40px;"><i class="fas fa-user"></i> &nbsp Cadastrar</a>
        </div>

        @if (!empty($dados))
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-full-width">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">CPF</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados as $dado)
                                    @php
                                        $linkReadMore = url('/cliente/' . $dado->id);
                                        $linkEditItem = url ('/cliente/editar/' . $dado->id);
                                        $linkRemoveItem = url ('/cliente/remover/' . $dado->id);
                                    @endphp

                                    <tr>
                                        <td class="text-center">{{$dado->nome}}</td>
                                        <td class="text-center">{{$dado->cpf}}</td>
                                        <td class="text-center">{{$dado->email}}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href={{$linkReadMore}} class="btn btn-info mx-1"><i class="fa fa-eye mr-1 mb-0" aria-hidden="true"></i> Ver Mais</a>
                                                <a href={{$linkEditItem}} class="btn btn-warning mx-1" style="color:white"><i class="fa fa-pen mr-1 mb-0" aria-hidden="true"></i> Editar</a>
                                                <a href={{$linkRemoveItem}} class="btn btn-danger mx-1"><i class="fa fa-trash mr-1 mb-0" aria-hidden="true"></i> Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
