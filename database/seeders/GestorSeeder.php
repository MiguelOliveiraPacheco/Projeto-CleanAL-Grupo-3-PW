<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gestor;

class GestorSeeder extends Seeder
{
    public function run()
    {
        // Cria 3 gestores com Faker
        Gestor::factory()->count(3)->create();
    }
}
