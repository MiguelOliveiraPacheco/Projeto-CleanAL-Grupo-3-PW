<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LimpezaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'data' => $this->faker->dateTimeBetween('now', '+1 month'),
            'hora' => $this->faker->time(),
            'estado' => $this->faker->randomElement(['agendada', 'em_progresso', 'concluida']),
            'descricao' => $this->faker->sentence(),
            'duracao_estimada_min' => $this->faker->numberBetween(30, 240),
        ];
    }
}
