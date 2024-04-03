@extends('layout.nav')

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-4">
            <div style="margin-bottom:15px; padding-top:15px; display:flex; justify-content:space-between; align-items:center">
                <h2>Agenda Diária do Consultório</h2>
            </div>

            <!-- Formulário de busca -->
            <form action="{{ route('home.buscar') }}" method="GET" class="mb-4">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <input type="text" name="nome_profissional" class="form-control" placeholder="Nome do profissional">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="nome_cliente" class="form-control" placeholder="Nome do paciente">
                    </div>
                    <div class="col-md-1">
                        <input type="text" name="sala" class="form-control" placeholder="Digite a sala">
                    </div>
                    <div class="col-md-2">
                        <select name="frequencia" class="form-control">
                        <option value="" selected disabled>Frequência</option>
                        <option value="Agendado">Agendado</option>
                        <option value="Lista de Espera">Lista de Espera</option>
                        <option value="Presente">Presente</option>
                        <option value="Falta">Falta</option>
                        <option value="Falta Justificada">Falta Justificada</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Limpar Filtros</a>
                    </div>
                </div>
            </form>

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
                                            <option value="Lista de Espera" {{$consulta->frequencia == 'Lista de Espera' ? 'selected' : ''}}>Lista de Espera</option>
                                            <option value="Presente" {{ $consulta->frequencia == 'Presente' ? 'selected' : '' }}>Presente</option>
                                            <option value="Falta" {{ $consulta->frequencia == 'Falta' ? 'selected' : '' }}>Falta</option>
                                            <option value="Falta Justificada" {{ $consulta->frequencia == 'Falta Justificada' ? 'selected' : '' }}>Falta Justificada</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="row mt-1">
                <div class="col-md-12">
                    <nav aria-label="Navegação de página">
                        <ul class="pagination justify-content-center">
                            @if ($dados->currentPage() > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dados->previousPageUrl() }}" aria-label="Anterior">
                                        Anterior
                                    </a>
                                </li>
                            @endif

                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    Mostrando {{ $dados->firstItem() }} a {{ $dados->lastItem() }} de {{ $dados->total() }} resultados
                                </a>
                            </li>

                            @if ($dados->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dados->nextPageUrl() }}" aria-label="Próximo">
                                        Próximo
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            @else
            <div class="alert alert-warning" role="alert">
                Nenhuma consulta encontrada.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
