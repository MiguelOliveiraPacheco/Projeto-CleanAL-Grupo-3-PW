<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class FuncionarioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // ou bcrypt('password')
            'telefone' => $this->faker->phoneNumber(),
            'morada' => $this->faker->address(),
            'anos_exp' => $this->faker->numberBetween(0, 10),
            'preco_hora' => $this->faker->randomFloat(2, 10, 25),
            // gestor_id será atribuído pelo seeder
        ];
    }
}
