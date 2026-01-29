<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use App\Models\Movie;

class DirectorController extends Controller
{
    public function index()
    {
        return Director::all();
    }

    public function store(Request $request)
    {
        return Director::create($request->all());
    }

    public function show(Director $director)
    {
        return $director->load('movies');
    }

    public function update(Request $request, Director $director)
    {
        $director->update($request->all());
        return $director;
    }

    public function destroy(Director $director)
    {
        $director->delete();
        return response()->noContent();
    }
}
