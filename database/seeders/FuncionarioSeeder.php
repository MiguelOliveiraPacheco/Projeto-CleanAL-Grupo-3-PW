<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use App\Models\Gestor;

class FuncionarioSeeder extends Seeder
{
    public function run()
    {
        // Para cada gestor, cria 5 funcionários associados
        $gestores = Gestor::all();

        foreach ($gestores as $gestor) {
            Funcionario::factory()->count(5)->create([
                'gestor_id' => $gestor->id,
            ]);
        }
    }
}
