<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlojamentoController;
use App\Http\Controllers\LimpezaController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\AlojamentoController as WebAlojamentoController;
use App\Http\Controllers\Web\FuncionarioController as WebFuncionarioController;
use App\Http\Controllers\Web\GestorController as WebGestorController;

// NOVAS ROTAS WEB (formulário Alojamento)
Route::prefix('web')->group(function () {
    Route::get('/alojamentos', [WebAlojamentoController::class, 'index'])->name('web.alojamentos.index');
    Route::get('/alojamentos/create', [WebAlojamentoController::class, 'create'])->name('web.alojamentos.create');
    Route::post('/alojamentos', [WebAlojamentoController::class, 'store'])->name('web.alojamentos.store');
    Route::get('/alojamentos/{id}', [WebAlojamentoController::class, 'show'])->name('web.alojamentos.show');
    Route::get('/funcionarios', [WebFuncionarioController::class, 'index'])->name('web.funcionarios.index');
    Route::get('/funcionarios/create', [WebFuncionarioController::class, 'create'])->name('web.funcionarios.create');
    Route::post('/funcionarios', [WebFuncionarioController::class, 'store'])->name('web.funcionarios.store');
    Route::get('/gestores', [WebGestorController::class, 'index'])->name('web.gestores.index');
    Route::get('/gestores/create', [WebGestorController::class, 'create'])->name('web.gestores.create');
    Route::post('/gestores', [WebGestorController::class, 'store'])->name('web.gestores.store');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rotas para listar dados (apenas visualização)
Route::get('/alojamentos', [AlojamentoController::class, 'index'])->name('alojamentos.index');
Route::get('/alojamentos/{id}', [AlojamentoController::class, 'show'])->name('alojamentos.show');

Route::get('/limpezas', [LimpezaController::class, 'index'])->name('limpezas.index');
Route::get('/limpezas/{id}', [LimpezaController::class, 'show'])->name('limpezas.show');

Route::get('/gestores', [GestorController::class, 'index'])->name('gestores.index');
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');

// Login com Livewire
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Registo com Livewire
Route::get('/registo', function () {
    return view('auth.register');
})->name('registo');

// Logout tradicional
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Dashboard protegido
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Página inicial
Route::get('/', function () {
    return redirect()->route('login');
});
