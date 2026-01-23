<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🎬 {{ $movie->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">

            <div class="flex flex-col md:flex-row gap-6">
                {{-- Poster --}}
                <div class="w-48 flex-shrink-0">
                    @if ($movie->poster)
                    <img src="{{ asset('storage/' . $movie->poster) }}"
                        class="w-full rounded shadow object-cover">
                    @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                        Sin imagen
                    </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 space-y-3">
                    <p><strong>Director:</strong> {{ $movie->director->nombre }}</p>
                    <p><strong>Género:</strong> {{ $movie->genre }}</p>
                    <p><strong>Duración:</strong> {{ $movie->duration }} min</p>
                    <p><strong>Estreno:</strong> {{ $movie->release_date }}</p>

                    @if ($movie->description)
                    <p class="text-gray-700 mt-4">
                        {{ $movie->description }}
                    </p>
                    @endif
                </div>
            </div>

            {{-- Acciones --}}
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('movies.edit', $movie) }}"
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    ✏️ Editar
                </a>

                <a href="{{ route('movies.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    ⬅️ Volver
                </a>
            </div>

        </div>
    </div>
</x-app-layout>