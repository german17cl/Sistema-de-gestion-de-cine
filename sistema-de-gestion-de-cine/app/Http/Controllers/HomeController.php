<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::with('director')
            ->latest()
            ->take(6)
            ->get();

        $genres = Movie::select('genre')
            ->distinct()
            ->pluck('genre');

        return view('home', compact('movies', 'genres'));
    }
}
