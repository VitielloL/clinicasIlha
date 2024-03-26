<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_profissional extends Seeder
{
    public function run(): void
    {
        DB::table('profissionais')->insert([
            'cpf' => '12345678901',
            'nome' => 'João da Silva',
            'celular' => '11-1111-1111',
            'email' => 'opaitestatudo@gmail.com',
            'cep' => '11111111',
            'bairro' => 'Centro',
            'logradouro' => 'Rua Teste',
            'numero' => '1',
            'complemento' => 'Apto 1',
            'cidade' => 'São Paulo',
            'uf' => 'SP',
        ]);
    }
}
