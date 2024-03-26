<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('profissional_id')->unsigned();
            $table->string('sala');
            $table->string('horario');
            $table->string('cid');
            $table->string('prof_frequencia');
            $table->string('paciente_frequencia');
            $table->string('especialidade');
            $table->string('plano');
            $table->string('nivel');
            $table->string('dia_semana');
            $table->string('data_consulta');
            // $table->date('data_consulta');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('profissional_id')->references('id')->on('profissionais')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
