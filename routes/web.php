<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;

// Página inicial redireciona para login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas (usuário autenticado)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('clientes', ClienteController::class);
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('agendamentos', AgendamentoController::class);
});
