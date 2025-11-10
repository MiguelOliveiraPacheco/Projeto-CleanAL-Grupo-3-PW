<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Limpeza;
use App\Models\Alojamento;
use App\Models\Funcionario;

class LimpezaSeeder extends Seeder
{
    public function run()
    {
        // Cada alojamento fica com 4 limpezas, atribuídas a um funcionário aleatório
        $alojamentos = Alojamento::all();

        foreach ($alojamentos as $alojamento) {
            $funcionario = Funcionario::inRandomOrder()->first();

            Limpeza::factory()->count(4)->create([
                'alojamento_id' => $alojamento->id,
                'funcionario_id' => $funcionario->id ?? null,
            ]);
        }
    }
}
