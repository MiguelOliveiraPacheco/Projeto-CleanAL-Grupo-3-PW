<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GestorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company(),
            'nif' => $this->faker->unique()->numerify('#########'),
            'telefone' => $this->faker->phoneNumber(),
        ];
    }
}
