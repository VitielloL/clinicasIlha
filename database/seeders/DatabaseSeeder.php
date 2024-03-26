<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(popula_cliente::class);
        $this->call(popula_profissional::class);
        $this->call(popula_consulta::class);
    }
}