<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alojamento;
use App\Models\Gestor;

class AlojamentoSeeder extends Seeder
{
    public function run()
    {
        // Cada gestor tem 3 alojamentos
        $gestores = Gestor::all();

        foreach ($gestores as $gestor) {
            Alojamento::factory()->count(3)->create([
                'gestor_id' => $gestor->id,
            ]);
        }
    }
}
