<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreActorRequest;

class ActorController extends Controller
{

    // Solo usuarios autenticados
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar el formulario de casting
    public function casting(Actor $actor)
    {
        $movies = Movie::all(); // todas las películas disponibles
        $actor->load('movies'); // carga las relaciones
        return view('actors.casting', compact('actor', 'movies'));
    }

    // Guardar casting
    public function storeCasting(Request $request, Actor $actor)
    {
        $request->validate([
            'movies' => 'array',
            'movies.*' => 'exists:movies,id',
            'roles' => 'array',
            'roles.*' => 'nullable|string|max:255',
        ]);

        $syncData = [];

        if ($request->has('movies')) {
            foreach ($request->movies as $movieId) {
                $syncData[$movieId] = ['role' => $request->roles[$movieId] ?? null];
            }
        }

        // Guardar las relaciones en la tabla pivote
        $actor->movies()->sync($syncData);

        return redirect()->route('actors.casting', $actor)
            ->with('success', 'Casting actualizado correctamente');
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

    public function store(StoreActorRequest $request): RedirectResponse
    {

        $data = $request->validated();

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

        if ($request->hasFile('photo')) {
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
