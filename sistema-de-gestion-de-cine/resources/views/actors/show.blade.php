<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🎬 {{ $actor->name }} {{ $actor->surname }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto space-y-8">

            {{-- Tarjeta de actor --}}
            <div class="bg-white shadow rounded-lg p-6 flex flex-col  md:flex-row gap-6">

                {{-- Foto --}}
                <div class="w-48 flex-shrink-0">
                    @if ($actor->photo)
                    <img src="{{ asset('storage/' . $actor->photo) }}"
                        class="w-full h-64 rounded shadow object-cover"
                        alt="{{ $actor->name }}">
                    @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                        Sin imagen
                    </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class=" flex flex-col">
                    <div class="flex-1 space-y-2">
                        <p><strong>Nombre:</strong> {{ $actor->name }}</p>
                        <p><strong>Apellido:</strong> {{ $actor->surname }}</p>
                        <p><strong>Fecha de nacimiento:</strong> {{ $actor->birth_date }}</p>
                        <p><strong>Nacionalidad:</strong> {{ $actor->nationality }}</p>

                        @if ($actor->biography)
                        <p class="text-gray-700 mt-2">{{ $actor->biography }}</p>
                        @endif
                    </div>

                    {{-- Botones --}}
                    <div class="flex justify-start  gap-3">
                        <a href="{{ route('actors.edit', $actor) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                            ✏️ Editar
                        </a>

                        <a href="{{ route('actors.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            ⬅️ Volver
                        </a>

                        
                        <a href="{{ route('actors.casting', $actor) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            🎭 Ver Casting
                        </a>

                        <p class="text-xs text-gray-500">
                            🎭 Rol: {{ $movie->pivot->role ?? '—' }}
                        </p>


                    </div>
                </div>
            </div>

            

            {{-- Grid de películas del actor --}}
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Películas del actor</h3>

                @if($actor->movies->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($actor->movies as $movie)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                        {{-- Poster --}}
                        <div class="h-64 bg-gray-100 flex items-center justify-center">
                            @if ($movie->poster)
                            <img src="{{ asset('storage/' . $movie->poster) }}"
                                class="h-full w-full object-cover"
                                alt="{{ $movie->title }}">
                            @else
                            <span class="text-gray-400 text-sm">Sin poster</span>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="p-4 space-y-1">
                            <h4 class="font-semibold text-lg text-gray-800 truncate">
                                {{ $movie->title }}
                            </h4>
                            <p class="text-sm text-gray-600">
                                🎬 Director: {{ $movie->director->name . ' ' . $movie->director->surname ?? '—' }}
                            </p>
                            <p class="text-sm text-gray-500">
                                📅 Fecha de estreno:{{ \Carbon\Carbon::parse($movie->release_date)->format('Y-m-d') }}
                            </p>
                            <p class="text-xs text-gray-500">
                                🎭 Género: {{ $movie->genre }}
                            </p>
                        </div>

                        {{-- Botón ver --}}
                        <div class="px-4 pb-4">
                            <a href="{{ route('movies.show', $movie) }}"
                                class="w-full text-center bg-blue-600 text-white py-2 rounded text-sm hover:bg-blue-700 block">
                                Ver película
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-center py-6">Este actor no tiene películas registradas.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>