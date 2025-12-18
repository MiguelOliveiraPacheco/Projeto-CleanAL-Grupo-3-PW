<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AlojamentoController;
use App\Http\Controllers\API\LimpezaController;
use App\Http\Controllers\API\GestorController;
use App\Http\Controllers\API\FuncionarioController;

Route::middleware('api')->group(function () {

    // Alojamentos
    Route::get('/alojamentos', [AlojamentoController::class, 'index']);
    Route::get('/alojamentos/{id}', [AlojamentoController::class, 'show']);

    // Limpezas
    Route::get('/limpezas', [LimpezaController::class, 'index']);
    Route::get('/limpezas/{id}', [LimpezaController::class, 'show']);

    // Gestores
    Route::get('/gestores', [GestorController::class, 'index']);
    Route::get('/gestores/{id}', [GestorController::class, 'show']);

    // Funcionários
    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show']);

});


// Rotas API temporárias (para teste)
Route::prefix('api')->group(function () {
    // Alojamentos
    Route::get('/alojamentos', [\App\Http\Controllers\API\AlojamentoController::class, 'index']);
    Route::get('/alojamentos/{id}', [\App\Http\Controllers\API\AlojamentoController::class, 'show']);

    // Limpezas
    Route::get('/limpezas', [\App\Http\Controllers\API\LimpezaController::class, 'index']);
    Route::get('/limpezas/{id}', [\App\Http\Controllers\API\LimpezaController::class, 'show']);

    // Gestores
    Route::get('/gestores', [\App\Http\Controllers\API\GestorController::class, 'index']);
    Route::get('/gestores/{id}', [\App\Http\Controllers\API\GestorController::class, 'show']);

    // Funcionários
    Route::get('/funcionarios', [\App\Http\Controllers\API\FuncionarioController::class, 'index']);
    Route::get('/funcionarios/{id}', [\App\Http\Controllers\API\FuncionarioController::class, 'show']);
});
