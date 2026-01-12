<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
        public function run()
        {
            $directores = \App\Models\Director::factory(5)->create();
            $actores = \App\Models\Actor::factory(20)->create();

            $peliculas = \App\Models\Movie::factory(10)->create();

            foreach ($peliculas as $pelicula) {
                $pelicula->actors()->attach(
                    $actores->random(3),
                    ['rol' => 'Protagonista']
                );
            }
        }

}
