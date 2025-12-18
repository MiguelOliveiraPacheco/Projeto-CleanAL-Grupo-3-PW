<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alojamento;
use Illuminate\Http\Request;

class AlojamentoController extends Controller
{

    public function index()
    {
        $alojamentos = Alojamento::with('gestor')->get();

        return response()->json([
            'success' => true,
            'data' => $alojamentos,
            'message' => 'Lista de alojamentos obtida com sucesso',
            'count' => $alojamentos->count()
        ]);
    }

    public function show($id)
    {
        $alojamento = Alojamento::with(['gestor', 'limpezas'])->find($id);

        if (!$alojamento) {
            return response()->json([
                'success' => false,
                'message' => 'Alojamento não encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $alojamento,
            'message' => 'Alojamento obtido com sucesso'
        ]);
    }
}
