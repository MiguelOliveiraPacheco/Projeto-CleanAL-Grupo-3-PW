<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Gestor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Mostrar formulário para criar novo funcionário
     */
    public function create()
    {
        $gestores = Gestor::all();
        return view('funcionarios.create', compact('gestores'));
    }

    /**
     * Guardar novo funcionário
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email',
            'password' => 'required|string|min:6',
            'telefone' => 'nullable|string',
            'morada' => 'nullable|string',
            'anos_exp' => 'required|integer|min:0',
            'preco_hora' => 'nullable|numeric|min:0',
            'gestor_id' => 'required|exists:gestores,id'
        ]);

        Funcionario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'morada' => $request->morada,
            'anos_exp' => $request->anos_exp,
            'preco_hora' => $request->preco_hora,
            'gestor_id' => $request->gestor_id
        ]);

        return redirect()->route('web.funcionarios.index')
            ->with('success', 'Funcionário criado com sucesso!');
    }
}
