<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_consulta extends Seeder
{
    public function run(): void
    {
        DB::table('consultas')->insert([
            'cliente_id' => '1',
            'profissional_id' => '1',
            'sala' => '1',
            'horario' => '10:30',
            'cid' => 'J93 - Pneumotórax',
            'prof_frequencia' => 'ok',
            'paciente_frequencia' => 'ok',
            'especialidade' => 'Cirurgião Torácico',
            'plano' => 'UNIMED',
            'nivel' => 'Gold',
            'dia_semana' => 'Segunda-Feira',
            'data_consulta' => '2024-03-25',
        ]);
    }
}