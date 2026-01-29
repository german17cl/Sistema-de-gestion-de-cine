<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎬 Películas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- Header acciones --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    {{ $movies->links('pagination::tailwind') }}
                </div>

                <a href="{{ route('movies.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    ➕ Nueva película
                </a>
            </div>

            {{-- Grid de películas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">  
            <!--<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">-->

                @forelse ($movies as $movie)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                    {{-- Poster --}}
                    <div class="h-72 bg-gray-100 flex items-center justify-center">

                        @if ($movie->poster)
                        <img
                            src="{{ asset('storage/' . $movie->poster) }}"
                            class="h-full w-full object-cover"
                            alt="{{ $movie->title }}">
                        @else
                        <span class="text-gray-400 text-sm">Sin poster</span>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="p-4 space-y-1">
                        <h3 class="font-semibold text-lg text-gray-800 truncate">
                            {{ $movie->title }}
                        </h3>

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

                    {{-- Acciones --}}
                    <div class="px-4 pb-4 flex gap-2 justify-between">
                        <a href="{{ route('movies.show', $movie) }}"
                            class="flex-1 text-center bg-blue-600 text-white py-2 rounded text-sm hover:bg-blue-700">
                            Ver
                        </a>

                        <a href="{{ route('movies.edit', $movie) }}"
                            class="flex-1 text-center bg-yellow-100 text-yellow-700 py-2 rounded text-sm hover:bg-yellow-200">
                            Editar
                        </a>

                        <a href="{{ route('movies.delete', $movie) }}"
                            class="flex-1 text-center bg-red-100 text-red-700 py-2 rounded text-sm hover:bg-red-200">
                            Eliminar
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    No hay películas registradas 🎥
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>