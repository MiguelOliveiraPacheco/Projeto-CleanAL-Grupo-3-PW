<?php

namespace App\Http\Controllers;

use App\Models\Alojamento;
use Illuminate\Http\Request;

class AlojamentoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Pesquisa APENAS por nome do alojamento
            $alojamentos = Alojamento::where('nome', 'like', "%{$search}%")
                ->with('gestor')
                ->get();
        } else {
            // Sem pesquisa, mostra tudo
            $alojamentos = Alojamento::with('gestor')->get();
        }

        return view('alojamentos.index', compact('alojamentos', 'search'));
    }

    public function show($id)
    {
        $alojamento = Alojamento::with(['gestor', 'limpezas' => function($query) {
            $query->orderBy('data', 'desc');
        }])->findOrFail($id);

        return view('alojamentos.show', compact('alojamento'));
    }
}
