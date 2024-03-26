<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{   
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'celular',
        'cep',
        'uf',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'complemento',
    ];

    use HasFactory;
}