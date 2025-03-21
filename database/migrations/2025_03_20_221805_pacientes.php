<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->enum('genero', ['masculino'], ['feminino'], ['outros'])->nullable();
            $table->enum('estado_civil', ['Solteiro(a)'], ['Casado(a)'], ['Divorciado(a)'], ['Viúvo(a)'], ['Outros'])->nullable();
            $table->boolean('tem_filhos')->default(false);
            $table->integer('quantidade_filhos')->nullable();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('contato_emergencial')->nullable();
            $table->string('telefone_emergencial')->nullable();
            $table->boolean('tem_plano_saude')->default(false);
            $table->string('plano_saude')->nullable();
            $table->string('forma_atendimento')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
