<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ActorController extends Controller
{

    // Solo usuarios autenticados
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $actors = Actor::latest()->paginate(10);
        return view('actors.index', compact('actors'));
    }

        public function create()
    {
        $movies = Movie::all();
        $actors = Actor::all();

        return view('actors.create', compact('movies', 'actors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'biography' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('actors', 'public');
        }

        Actor::create($data);

        return redirect()->route('actors.index')
            ->with('success', 'Actor creado correctamente');
    }


    public function show(Actor $actor)
    {
        $actor->load('movies.director'); // carga las películas y su director
        return view('actors.show', compact('actor'));
    }


    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }
    
    public function update(Request $request, Actor $actor)
    {
        $data = $request->validate([
            //id, name, surname, birth_date, nationality, biography, photo,
            //timestamps
            'id' => 'nullable|integer|unique:actors,id',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'biography' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
            'photo' => 'nullable|image|max:2048',
            'timestamps' => 'nullable',
        ]);

        if($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('actors', 'public');
        }

        $actor->update($data);

        if (!empty($data['timestamps'])) {
            $actor->timestamps = $data['timestamps'];
        }

        return redirect()->route('actors.index')
            ->with('success', 'Actor actualizado correctamente');
    }

    public function delete(Actor $actor)
    {
        return view('actors.delete', compact('actor'));
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actors.index')
            ->with('success', 'Actor eliminado correctamente');
    }
}
