<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlojamentoController;
use App\Http\Controllers\LimpezaController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\FuncionarioController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rotas para listar dados (apenas visualização)
Route::get('/alojamentos', [AlojamentoController::class, 'index'])->name('alojamentos.index');
Route::get('/alojamentos/{id}', [AlojamentoController::class, 'show'])->name('alojamentos.show');

Route::get('/limpezas', [LimpezaController::class, 'index'])->name('limpezas.index');
Route::get('/limpezas/{id}', [LimpezaController::class, 'show'])->name('limpezas.show');

Route::get('/gestores', [GestorController::class, 'index'])->name('gestores.index');
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
