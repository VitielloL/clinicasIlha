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
            $table->string('sala')->nullable();;
            $table->string('horario')->nullable();;
            $table->string('cid')->nullable();;
            $table->string('prof_frequencia')->nullable();;
            $table->string('paciente_frequencia')->nullable();;
            $table->string('especialidade')->nullable();;
            $table->string('plano')->nullable();;
            $table->string('nivel')->nullable();;
            $table->string('dia_semana')->nullable();;
            $table->string('data_consulta')->nullable();;
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
