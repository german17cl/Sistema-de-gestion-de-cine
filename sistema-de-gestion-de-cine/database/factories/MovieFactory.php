<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Director;

class MovieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'release_date' => fake()->date(),
            'duration' => fake()->numberBetween(80, 180),
            'genre' => fake()->randomElement([
                'Drama', 'Comedy', 'Action', 'Sci-Fi', 'Thriller'
            ]),
            'poster' => null,
            'director_id' => Director::factory(),
        ];
    }
}
