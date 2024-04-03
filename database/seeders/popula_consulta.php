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
            [
                'cliente_id' => '1',
                'profissional_id' => '1',
                'sala' => '1',
                'horario' => '10:30',
                'cid' => 'J93 - Pneumotórax',
                'frequencia' => 'Presente',
                'especialidade' => 'Cirurgião Torácico',
                'plano' => 'UNIMED',
                'nivel' => 'Gold',
                'dia_semana' => 'Segunda-Feira',
                'data_consulta' => '2024-03-25',
            ],
            [
                'cliente_id' => '1',
                'profissional_id' => '2',
                'sala' => '2',
                'horario' => '13:45',
                'cid' => 'A09 - Diarréia e gastroenterite de origem infecciosa presumível',
                'frequencia' => 'Falta',
                'especialidade' => 'Nutricionista',
                'plano' => 'AMIL',
                'nivel' => 'Premium',
                'dia_semana' => 'Terça-Feira',
                'data_consulta' => '2024-03-26',
            ],
            [
                'cliente_id' => '1',
                'profissional_id' => '3',
                'sala' => '3',
                'horario' => '09:00',
                'cid' => 'F32 - Episódios depressivos',
                'frequencia' => 'Presente',
                'especialidade' => 'Psicólogo',
                'plano' => 'SULAMÉRICA',
                'nivel' => 'Básico',
                'dia_semana' => 'Quarta-Feira',
                'data_consulta' => '2024-03-27',
            ],
            [
                'cliente_id' => '1',
                'profissional_id' => '4',
                'sala' => '4',
                'horario' => '16:20',
                'cid' => 'F41 - Transtornos de ansiedade',
                'frequencia' => 'Falta Justificada',
                'especialidade' => 'Psicólogo',
                'plano' => 'GOLDEN CROSS',
                'nivel' => 'Top',
                'dia_semana' => 'Sexta-Feira',
                'data_consulta' => '2024-03-29',
            ],
        ]);
    }
}
