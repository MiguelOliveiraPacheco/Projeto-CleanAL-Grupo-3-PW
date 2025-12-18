<?php

namespace App\Http\Controllers;

use App\Models\Limpeza;
use Illuminate\Http\Request;

class LimpezaController extends Controller
{
    public function index()
    {
        $limpezas = Limpeza::with(['alojamento', 'funcionario'])
            ->orderBy('data', 'desc')
            ->get();

        return view('limpezas.index', compact('limpezas'));
    }

    public function show($id)
    {
        $limpeza = Limpeza::with(['alojamento', 'funcionario'])->findOrFail($id);
        return view('limpezas.show', compact('limpeza'));
    }
}
