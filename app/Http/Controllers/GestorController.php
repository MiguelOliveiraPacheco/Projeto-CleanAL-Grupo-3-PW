<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index()
    {
        // withCount em vez de loadCount
        $gestores = Gestor::withCount(['alojamentos', 'funcionarios'])->get();

        return view('gestores.index', compact('gestores'));
    }
}
