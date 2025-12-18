<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Alojamento;
use App\Models\Gestor;
use Illuminate\Http\Request;

class AlojamentoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $alojamentos = Alojamento::where('nome', 'like', "%{$search}%")
                ->with('gestor')
                ->get();
        } else {
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

    // NOVO: Formulário de criação
    public function create()
    {
        $gestores = Gestor::all();
        return view('alojamentos.create', compact('gestores'));
    }

    // NOVO: Guardar alojamento
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'morada' => 'required|string',
            'num_quartos' => 'required|integer|min:1',
            'gestor_id' => 'required|exists:gestores,id'
        ]);

        Alojamento::create($request->all());

        return redirect()->route('web.alojamentos.index')
            ->with('success', 'Alojamento criado com sucesso!');
    }
}
