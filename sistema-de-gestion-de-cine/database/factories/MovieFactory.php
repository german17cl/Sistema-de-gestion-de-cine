<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    public function definition()
    {
        return [
            'titulo' => fake()->sentence(3),
            'anio' => fake()->year(),
            'duracion' => fake()->numberBetween(80, 180),
            'sinopsis' => fake()->paragraph(),
            'director_id' => \App\Models\Director::factory(),
        ];
    }
}
