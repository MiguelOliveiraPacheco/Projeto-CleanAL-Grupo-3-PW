<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️ Primeiro criamos os gestores
        $this->call(GestorSeeder::class);

        // 2️ Depois os funcionários (que dependem dos gestores)
        $this->call(FuncionarioSeeder::class);

        // 3️ E por fim os alojamentos e limpezas
        $this->call(AlojamentoSeeder::class);
        $this->call(LimpezaSeeder::class);
    }
}
