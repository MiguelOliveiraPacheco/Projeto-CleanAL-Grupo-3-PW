<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alojamento;
use App\Models\Limpeza;
use App\Models\Gestor;
use App\Models\Funcionario;

class DashboardController extends Controller
{
    public function index()
    {
        // Estatísticas básicas
        $stats = [
            'total_alojamentos' => Alojamento::count(),
            'total_limpezas' => Limpeza::count(),
            'limpezas_hoje' => Limpeza::whereDate('data', today())->count(),
            'limpezas_pendentes' => Limpeza::where('estado', 'agendada')->count(),
            'limpezas_concluidas' => Limpeza::where('estado', 'concluida')->count(),
            'total_gestores' => Gestor::count(),
            'total_funcionarios' => Funcionario::count(),
        ];

        // Últimas limpezas
        $ultimas_limpezas = Limpeza::with(['alojamento', 'funcionario'])
            ->orderBy('data', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('stats', 'ultimas_limpezas'));
    }
}
