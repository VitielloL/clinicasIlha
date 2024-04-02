<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_cliente extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'cpf' => '123.456.789-01',
                'nome' => 'João da Silva',
                'celular' => '11-1111-1111',
                'email' => 'joao@example.com',
                'cep' => '11111-111',
                'bairro' => 'Centro',
                'logradouro' => 'Rua Teste',
                'numero' => '1',
                'complemento' => 'Apto 1',
                'cidade' => 'São Paulo',
                'uf' => 'SP',
            ],
            [
                'cpf' => '234.567.890-12',
                'nome' => 'Maria Oliveira',
                'celular' => '22-2222-2222',
                'email' => 'maria@example.com',
                'cep' => '22222-222',
                'bairro' => 'Bairro Novo',
                'logradouro' => 'Avenida Principal',
                'numero' => '10',
                'complemento' => 'Casa 2',
                'cidade' => 'Rio de Janeiro',
                'uf' => 'RJ',
            ],
            [
                'cpf' => '345.678.901-23',
                'nome' => 'Carlos Santos',
                'celular' => '33-3333-3333',
                'email' => 'carlos@example.com',
                'cep' => '33333-333',
                'bairro' => 'Bela Vista',
                'logradouro' => 'Rua das Flores',
                'numero' => '5',
                'complemento' => 'Casa 3',
                'cidade' => 'Belo Horizonte',
                'uf' => 'MG',
            ],
            [
                'cpf' => '456.789.012-34',
                'nome' => 'Ana Pereira',
                'celular' => '44-4444-4444',
                'email' => 'ana@example.com',
                'cep' => '44444-444',
                'bairro' => 'Jardim São Paulo',
                'logradouro' => 'Rua das Árvores',
                'numero' => '20',
                'complemento' => 'Casa 5',
                'cidade' => 'Curitiba',
                'uf' => 'PR',
            ],
            [
                'cpf' => '567.890.123-45',
                'nome' => 'Pedro Souza',
                'celular' => '55-5555-5555',
                'email' => 'pedro@example.com',
                'cep' => '55555-555',
                'bairro' => 'Centro',
                'logradouro' => 'Avenida Central',
                'numero' => '15',
                'complemento' => 'Apto 10',
                'cidade' => 'Porto Alegre',
                'uf' => 'RS',
            ]
        ]);
    }
}
