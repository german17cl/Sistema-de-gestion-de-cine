<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Movie;

class DirectorController extends Controller
{
    // Solo usuarios autenticados
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listado de directores
     */
    public function index()
    {
        $directors = Director::latest()->paginate(10);

        return view('directors.index', compact('directors'));
    }

    /**
     * Formulario crear
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Guardar director
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'biography' => 'nullable|string',
        ]);

        Director::create($data);

        return redirect()
            ->route('directors.index')
            ->with('success', 'Director creado correctamente');
    }

    /**
     * Ver detalle
     */
    public function show(Director $director)
    {
        $director->load('movies');

        return view('directors.show', compact('director'));
    }

    /**
     * Formulario editar
     */
    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    /**
     * Actualizar director
     */
    public function update(Request $request, Director $director)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'biography' => 'nullable|string',
        ]);

        $director->update($data);

        return redirect()
            ->route('directors.index')
            ->with('success', 'Director actualizado correctamente');
    }

    /**
     * Vista confirmar borrado
     */
    public function delete(Director $director)
    {
        return view('directors.delete', compact('director'));
    }

    /**
     * Eliminar director
     */
    public function destroy(Director $director)
    {
        $director->delete();

        return redirect()
            ->route('directors.index')
            ->with('success', 'Director eliminado correctamente');
    }
}
