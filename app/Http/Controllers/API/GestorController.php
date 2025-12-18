<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller
{

    public function index()
    {
        $gestores = Gestor::withCount(['alojamentos', 'funcionarios'])->get();

        return response()->json([
            'success' => true,
            'data' => $gestores,
            'message' => 'Lista de gestores obtida com sucesso',
            'count' => $gestores->count()
        ]);
    }

    public function show($id)
    {
        $gestor = Gestor::with(['alojamentos', 'funcionarios'])->find($id);

        if (!$gestor) {
            return response()->json([
                'success' => false,
                'message' => 'Gestor não encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $gestor,
            'message' => 'Gestor obtido com sucesso'
        ]);
    }
}
