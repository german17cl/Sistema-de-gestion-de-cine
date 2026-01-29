<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Bienvenida -->
            <h1 class="text-2xl font-bold mb-6">
                Hola, {{ Auth::user()->name }} 👋
                <br>
                Bienvenido al Sistema de Gestión de Cine
            </h1>

            <!-- Tarjetas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

                <!-- Actores -->
                <div class="bg-white p-6 rounded shadow flex flex-col">
                    <h2 class="text-4xl">🎭 </h2>
                    <h2 class="text-xl">Actores </h2>
                    <p class="mt-2">Total: {{ $actorsCount }} actores</p>
                    <a class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 mt-2 w-1/2" href="{{ route('actors.index') }}" class="text-blue-600">
                        Ver todo
                    </a>
                </div>

                <!-- Directores -->
                <div class="bg-white p-6 rounded shadow flex flex-col">
                    <h2 class="text-4xl">🎬 </h2>
                    <h2 class="text-xl">Directores</h2>
                    <p class="mt-2">Total: {{ $directorsCount }} directores</p>
                    <a class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 mt-2 w-1/2" href="{{ route('directors.index') }}" class="text-blue-600">
                        Ver todo
                    </a>
                </div>

                <!-- Películas -->
                <div class="bg-white p-6 rounded shadow flex flex-col">
                    <h2 class="text-4xl">🎥 </h2>
                    <h2 class="text-xl">Películas</h2>
                    <p class="mt-2">Total: {{ $moviesCount }} películas</p>
                    <a class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 mt-2 w-1/2" href="{{ route('movies.index') }}" class="text-blue-600">
                        Ver todo
                    </a>
                </div>

                <!-- Último estreno -->
                <div class="bg-white p-6 rounded shadow flex flex-col">
                    <h2 class="text-4xl">⭐</h2>
                    <h2 class="text-xl">Último lanzamiento</h2>


                    @if($latestMovie)
                    <p class="mt-2">{{ $latestMovie->title }}</p>
                    <a class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 mt-2 w-1/2" href="{{ route('movies.show', $latestMovie) }}" class="text-blue-600">
                        Detalles
                    </a>
                    @else
                    <p>No hay películas.</p>
                    @endif
                </div>

            </div>

            <!-- Timeline -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl mb-4">🕒 Últimas películas</h2>
                <ul>
                    @foreach($latestMovies as $movie)
                    <li class="border-b py-2">
                        

                        <div class="flex p-3 items-center gap-4 border rounded hover:bg-gray-50">
                            @if ($movie->poster)
                            <div class="flex items-center justify-center h-24 w-20 overflow-hidden rounded shadow">
                                <img src="{{ asset('storage/' . $movie->poster) }}"
                                    class="max-h-full max-w-full object-contain">
                            </div>
                            @else
                            <div class="flex items-center justify-center h-24 w-20 bg-gray-200 rounded text-xs text-gray-500">
                                N/A
                            </div>
                            @endif
                            <div class=" flex flex-col">
                                <p class="font-bold text-xl">{{ $movie->title }} </p>
                                <p class="text-gray-600">Director: {{ $movie->director->name . ' ' . $movie->director->surname }}</p>
                                <p class="text-gray-600">Fecha de estreno: ({{ $movie->release_date }})</p>
                                <p class="text-gray-600">Género: {{ $movie->genre }}</p>
                                <div class="flex flex-row gap-4">
                                    <a href="{{ route('movies.show', $movie) }}" class="text-purple-800 hover:underline mt-2">
                                        Ver detalles
                                    </a>
                                    <a href="{{ route('movies.edit', $movie)}}" class="text-green-600 hover:underline mt-2"> Editar</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>