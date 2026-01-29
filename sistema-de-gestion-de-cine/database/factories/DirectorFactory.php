<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
    public function definition()
    {
        //id, name, surname, birth_date, nationality, biography, photo,
        //timestamps

        return [
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'nationality' => fake()->country(),
            'biography' => fake()->text(200),
            'photo' => null,
        ];
    
    }
}
