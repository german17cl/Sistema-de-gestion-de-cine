<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 1000),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birth_date' => $this->faker->date(),
            'nationality' => $this->faker->country(),
            'biography' => $this->faker->paragraph(),
            'photo' => null,
        ];
    }
}
