<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacientesModel extends Model
{
    protected $table = 'pacientes'; // Nome da tabela no banco de dados

    protected $fillable = ['nome', 'data_nascimento', 'genero', 'estado_civil', 'tem_filhos', 'quantidade_filhos', 'telefone', 'email', 'tem_plano_saude', 'plano_saude', 'forma_atendimento', 'observacoes'];
}
