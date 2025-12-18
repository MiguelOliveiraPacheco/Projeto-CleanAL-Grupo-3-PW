<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index(Request $request)
    {
        $query = Gestor::withCount(['alojamentos', 'funcionarios']);

        // Pesquisa por nome
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%")
                    ->orWhere('nif', 'like', "%{$search}%")
                    ->orWhere('telefone', 'like', "%{$search}%");
            });
        }

        $gestores = $query->get();

        return view('gestores.index', compact('gestores'));
    }

    /**
     * Mostrar formulário para criar novo gestor
     */
    public function create()
    {
        return view('gestores.create');
    }

    /**
     * Guardar novo gestor
     */
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'nome' => 'required|string|max:255',
            'nif' => 'required|string|size:9|unique:gestores,nif',
            'telefone' => 'nullable|string|max:20'
        ], [
            'nome.required' => 'O nome do gestor é obrigatório.',
            'nif.required' => 'O NIF é obrigatório.',
            'nif.size' => 'O NIF deve ter 9 dígitos.',
            'nif.unique' => 'Este NIF já está registado.'
        ]);

        // Criar gestor
        $gestor = Gestor::create([
            'nome' => $request->nome,
            'nif' => $request->nif,
            'telefone' => $request->telefone
        ]);

        return redirect()->route('web.gestores.index')
            ->with('success', 'Gestor "' . $gestor->nome . '" criado com sucesso!');
    }
}
