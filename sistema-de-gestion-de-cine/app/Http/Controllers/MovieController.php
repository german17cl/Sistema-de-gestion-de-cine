<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::with('director')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('movies.create', [
            'directors' => Director::all(),
            'actors' => Actor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'duration' => 'required|integer',
            'genre' => 'required|string',
            'poster' => 'nullable|image|max:2048',
            'director_id' => 'required|exists:directors,id',
            'actors' => 'array',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('movies', 'public');
        }

        $movie = Movie::create($data);

        if ($request->actors) {
            $movie->actors()->sync($request->actors);
        }

        return redirect()->route('movies.index')
            ->with('success', 'Película creada correctamente');
    }


    public function show(Movie $movie)
    {
        return view('movies.show', [
            'movie' => $movie->load('director', 'actors'),
        ]);
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', [
            'movie' => $movie,
            'directors' => Director::all(),
            'actors' => Actor::all(),
        ]);
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'release_date' => 'required|date',
            'duracion' => 'required|integer',
            'sinopsis' => 'nullable|string',
            'director_id' => 'required|exists:directors,id',
            'poster' => 'nullable|image|max:2048',
            'actors' => 'array',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('movies', 'public');
        }

        $movie->update($data);

        if ($request->actors) {
            $movie->actors()->sync($request->actors);
        }

        return redirect()
            ->route('movies.index')
            ->with('success', 'Película actualizada correctamente');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()
            ->route('movies.index')
            ->with('success', 'Película eliminada');
    }
}
