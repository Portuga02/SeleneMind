<?php

namespace App\Http\Controllers;

use App\Models\PacientesModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PacienteController extends Controller
{
    public function create()
    {
        return Inertia::render('Pacientes/Create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'nullable|string',
            'tem_filhos' => 'boolean',
            'quantidade_filhos' => 'nullable|integer|min:1',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email|unique:pacientes',
            'contato_emergencial' => 'nullable|string',
            'telefone_emergencial' => 'nullable|string',
            'tem_plano_saude' => 'boolean',
            'plano_saude' => 'nullable|string',
            'forma_atendimento' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        PacientesModel::create($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Pacienete cadastrado com sucesso');
    }
}
