<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alojamento;
use App\Models\Limpeza;
use App\Models\Gestor;
use App\Models\Funcionario;
use App\Models\User;  // ← IMPORTANTE!

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Obtém utilizador autenticado (se existir)
        $utilizador = auth()->user();  // ← Retorna User ou null

        // 2. Estatísticas
        $stats = [
            'total_alojamentos' => Alojamento::count(),
            'total_limpezas' => Limpeza::count(),
            'limpezas_hoje' => Limpeza::whereDate('data', today())->count(),
            'limpezas_pendentes' => Limpeza::where('estado', 'agendada')->count(),
            'limpezas_concluidas' => Limpeza::where('estado', 'concluida')->count(),
            'total_gestores' => Gestor::count(),
            'total_funcionarios' => Funcionario::count(),
        ];

        $ultimas_limpezas = Limpeza::with(['alojamento', 'funcionario'])
            ->orderBy('data', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($limpeza) {
                // Converte a string para Carbon
                if ($limpeza->data) {
                    $limpeza->data = \Carbon\Carbon::parse($limpeza->data);
                }
                return $limpeza;
            });
        return view('dashboard', compact('utilizador', 'stats', 'ultimas_limpezas'));
    }
}
