<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index(Request $request)
    {
        $query = Funcionario::with('gestor');

        // Pesquisa por nome (sempre disponível)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nome', 'like', "%{$search}%");
        }

        // FILTRO: Anos de experiência (mínimo)
        if ($request->filled('exp_min')) {
            $query->where('anos_exp', '>=', $request->exp_min);
        }

        // FILTRO: Anos de experiência (máximo)
        if ($request->filled('exp_max')) {
            $query->where('anos_exp', '<=', $request->exp_max);
        }

        // FILTRO: Preço por hora (máximo)
        if ($request->filled('preco_max')) {
            $query->where('preco_hora', '<=', $request->preco_max);
        }

        // FILTRO: Morada (cidade/bairro)
        if ($request->filled('morada')) {
            $query->where('morada', 'like', "%{$request->morada}%");
        }

        // Ordenação
        $query->orderBy('nome');

        $funcionarios = $query->get();

        return view('funcionarios.index', compact('funcionarios'));
    }
}
