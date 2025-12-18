<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Limpeza;
use Illuminate\Http\Request;

class LimpezaController extends Controller
{
    public function index()
    {
        $limpezas = Limpeza::with(['alojamento', 'funcionario'])
            ->orderBy('data', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $limpezas,
            'message' => 'Lista de limpezas obtida com sucesso',
            'count' => $limpezas->count()
        ]);
    }

    public function show($id)
    {
        $limpeza = Limpeza::with(['alojamento', 'funcionario'])->find($id);

        if (!$limpeza) {
            return response()->json([
                'success' => false,
                'message' => 'Limpeza não encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $limpeza,
            'message' => 'Limpeza obtida com sucesso'
        ]);
    }
}
