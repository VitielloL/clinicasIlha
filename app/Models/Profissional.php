<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = 'profissionais';

    protected $fillable = [
        'nome',
        'cpf',
        'especializacao',
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

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'profissional_id');
    }

    use HasFactory;
}
