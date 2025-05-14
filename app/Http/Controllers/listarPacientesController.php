<?php

namespace App\Http\Controllers;

use App\Models\PacientesModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class listarPacientesController extends Controller
{
    public function index()
    {
        $pacientes = PacientesModel::all();
       
        return Inertia::render('ListarPacientes', [
            'pacientes' => $pacientes,
        ]);
    }
}
