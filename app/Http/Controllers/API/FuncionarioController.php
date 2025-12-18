<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function index()
    {
        $funcionarios = Funcionario::with('gestor')->get();

        return response()->json([
            'success' => true,
            'data' => $funcionarios,
            'message' => 'Lista de funcionários obtida com sucesso',
            'count' => $funcionarios->count()
        ]);
    }

    public function show($id)
    {
        $funcionario = Funcionario::with(['gestor', 'limpezas'])->find($id);

        if (!$funcionario) {
            return response()->json([
                'success' => false,
                'message' => 'Funcionário não encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $funcionario,
            'message' => 'Funcionário obtido com sucesso'
        ]);
    }
}
