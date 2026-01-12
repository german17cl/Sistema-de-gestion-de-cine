<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'nacionalidad' => fake()->country(),
        ];
    }
}
