<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::get('/pacientes', function () {
    return Inertia::render('Pacientes/index');
})->name('pacientes.index');

Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
