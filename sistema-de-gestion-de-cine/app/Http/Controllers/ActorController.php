<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return Actor::all();
    }

    public function store(Request $request)
    {
        return Actor::create($request->all());
    }

    public function show(Actor $actor)
    {
        return $actor->load('movies');
    }

    public function update(Request $request, Actor $actor)
    {
        $actor->update($request->all());
        return $actor;
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->noContent();
    }
}
