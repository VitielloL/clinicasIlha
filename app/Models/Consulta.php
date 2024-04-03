<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';

    protected $fillable = [
        'cliente_id',
        'profissional_id',
        'sala',
        'cid',
        'horario',
        'frequencia',
        'especialidade',
        'plano',
        'nivel',
        'dia_semana',
        'data_consulta',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function profissional()
    {
        return $this->belongsTo(Profissional::class, 'profissional_id');
    }

    use HasFactory;
}
