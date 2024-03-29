@extends('layout.nav')

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h2 class="text-center mb-4">Agenda Semanal do Consultório</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th class="text-center">Data</th>
                            <th class="text-center">Dia da Semana</th>
                            <th class="text-center">Horário</th>
                            <th class="text-center">Sala</th>
                            <th class="text-center">Profissional</th>
                            <th class="text-center">Especialização</th>
                            <th class="text-center">Paciente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $dado)
                        <tr>
                            <td class="text-center">{{ $dado->data_consulta }}</td>
                            <td class="text-center">{{ $dado->dia_semana }}</td>
                            <td class="text-center">{{ $dado->horario }}</td>
                            <td class="text-center">{{ $dado->sala }}</td>
                            <td class="text-center">{{ $dado->profissional->nome }}</td>
                            <td class="text-center">{{ $dado->profissional->especializacao }}</td>
                            <td class="text-center">{{ $dado->cliente->nome }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 
