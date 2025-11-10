<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlojamentoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->streetName(),
            'morada' => $this->faker->address(),
            'num_quartos' => $this->faker->numberBetween(1, 5),
        ];
    }
}
