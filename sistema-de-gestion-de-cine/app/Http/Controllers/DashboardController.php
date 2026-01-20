<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'actorsCount' => Actor::count(),
            'directorsCount' => Director::count(),
            'moviesCount' => Movie::count(),

            // Última película por fecha de estreno
            'latestMovie' => Movie::orderBy('release_date', 'desc')->first(),

            // Últimas 5 películas
            'latestMovies' => Movie::orderBy('release_date', 'desc')->take(5)->get(),
        ]);
    }
}
