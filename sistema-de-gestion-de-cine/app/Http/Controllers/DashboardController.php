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
            'latestMovie' => Movie::orderBy('anio', 'desc')->first(),
            'latestMovies' => Movie::latest()->take(5)->get(),
        ]);
    }
}
