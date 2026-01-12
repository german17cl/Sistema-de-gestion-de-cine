<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Bienvenida -->
            <h1 class="text-2xl font-bold mb-6">
                Kaixo, {{ Auth::user()->name }} 👋  
                <br>
                Ongi etorri Zinema Kudeatzeko Sistemara
            </h1>

            <!-- Tarjetas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

                <!-- Actores -->
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl">🎭 Actoreak</h2>
                    <p class="mt-2">Guztira: {{ $actorsCount }} aktore</p>
                    <a href="{{ route('actors.index') }}" class="text-blue-600">
                        Ikusi guztiak
                    </a>
                </div>

                <!-- Directores -->
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl">🎬 Zuzendariak</h2>
                    <p class="mt-2">Guztira: {{ $directorsCount }} zuzendari</p>
                    <a href="{{ route('directors.index') }}" class="text-blue-600">
                        Ikusi guztiak
                    </a>
                </div>

                <!-- Películas -->
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl">🎥 Filmak</h2>
                    <p class="mt-2">Guztira: {{ $moviesCount }} film</p>
                    <a href="{{ route('movies.index') }}" class="text-blue-600">
                        Ikusi guztiak
                    </a>
                </div>

                <!-- Último estreno -->
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl">⭐ Azken estreinaldia</h2>
                    @if($latestMovie)
                        <p class="mt-2">{{ $latestMovie->title }}</p>
                        <a href="{{ route('movies.show', $latestMovie) }}" class="text-blue-600">
                            Xehetasunak
                        </a>
                    @else
                        <p>Ez dago filmik</p>
                    @endif
                </div>

            </div>

            <!-- Timeline -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl mb-4">🕒 Azken filmak</h2>
                <ul>
                    @foreach($latestMovies as $movie)
                        <li class="border-b py-2">
                            {{ $movie->title }} ({{ $movie->created_at->format('Y-m-d') }})
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
