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
            [
                'cpf' => '12345678901',
                'nome' => 'Ademar Santos',
                'especializacao' => 'Fonoaudiólogo',
                'celular' => '11-1111-1111',
                'email' => 'ademar@example.com',
                'cep' => '11111111',
                'bairro' => 'Centro',
                'logradouro' => 'Rua Teste',
                'numero' => '1',
                'complemento' => 'Apto 1',
                'cidade' => 'São Paulo',
                'uf' => 'SP',
            ],
            [
                'cpf' => '23456789012',
                'nome' => 'Maria Oliveira',
                'especializacao' => 'Nutricionista',
                'celular' => '22-2222-2222',
                'email' => 'maria@example.com',
                'cep' => '22222222',
                'bairro' => 'Bairro Novo',
                'logradouro' => 'Avenida Principal',
                'numero' => '10',
                'complemento' => 'Casa 2',
                'cidade' => 'Rio de Janeiro',
                'uf' => 'RJ',
            ],
            [
                'cpf' => '34567890123',
                'nome' => 'Carlos Santos',
                'especializacao' => 'Psicólogo',
                'celular' => '33-3333-3333',
                'email' => 'carlos@example.com',
                'cep' => '33333333',
                'bairro' => 'Bela Vista',
                'logradouro' => 'Rua das Flores',
                'numero' => '5',
                'complemento' => 'Casa 3',
                'cidade' => 'Belo Horizonte',
                'uf' => 'MG',
            ],
            [
                'cpf' => '45678901234',
                'nome' => 'Ana Pereira',
                'especializacao' => 'Psicólogo',
                'celular' => '44-4444-4444',
                'email' => 'ana@example.com',
                'cep' => '44444444',
                'bairro' => 'Jardim São Paulo',
                'logradouro' => 'Rua das Árvores',
                'numero' => '20',
                'complemento' => 'Casa 5',
                'cidade' => 'Curitiba',
                'uf' => 'PR',
            ]
        ]);
    }
}
