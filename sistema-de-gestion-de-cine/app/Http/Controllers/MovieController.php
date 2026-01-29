<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Solo usuarios autenticados
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $movies = Movie::with('director')
            ->latest()
            ->paginate(10);

        return view('movies.index', compact('movies'));
    }


    public function create()
    {
        $directors = Director::all();
        $actors = Actor::all();

        return view('movies.create', compact('directors', 'actors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'duration' => 'required|integer',
            'genre' => 'required|string|max:100',
            'poster' => 'nullable|image|max:2048',
            'director_id' => 'required|exists:directors,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('movies', 'public');
        }

        $movie = Movie::create($data);

        if (!empty($data['actors'])) {
            $movie->actors()->sync($data['actors']);
        }

        return redirect()->route('movies.index')
            ->with('success', 'Película creada correctamente');
    }

    public function show(Movie $movie)
    {
        $movie->load('director', 'actors');

        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $directors = Director::all();
        $actors = Actor::all();

        return view('movies.edit', compact('movie', 'directors', 'actors'));
    }

public function update(Request $request, Movie $movie)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'release_date' => 'required|date',
        'duration' => 'required|integer',
        'genre' => 'required|string',
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


    public function delete(Movie $movie)
    {
        return view('movies.delete', compact('movie'));
    }


    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Película eliminada correctamente');
    }
}
