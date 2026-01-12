<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::with('director', 'actors')->get();
    }

    public function store(Request $request)
    {
        return Movie::create($request->all());
    }

    public function show(Movie $movie)
    {
        return $movie->load('director', 'actors');
    }

    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());
        return $movie;
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->noContent();
    }
}
