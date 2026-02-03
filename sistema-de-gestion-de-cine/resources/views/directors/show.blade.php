<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🎬 {{ $director->name }} {{ $director->surname }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto space-y-10">

            {{-- Tarjeta Director --}}
            <div class="bg-white shadow rounded-lg p-6 flex flex-col md:flex-row gap-6">

                {{-- Foto --}}
                <div class="w-48 flex-shrink-0">
                    @if ($director->photo)
                    <img src="{{ asset('storage/' . $director->photo) }}"
                        class="w-full h-64 object-cover rounded shadow">
                    @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                        Sin foto
                    </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 space-y-3">
                    <p><strong>Nombre:</strong> {{ $director->name }}</p>
                    <p><strong>Apellido:</strong> {{ $director->surname }}</p>
                    <p><strong>Nacionalidad:</strong> {{ $director->nationality ?? '—' }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $director->birth_date ?? '—' }}</p>

                    @if ($director->biography)
                    <p class="text-gray-700 mt-4">
                        {{ $director->biography }}
                    </p>
                    @endif

                    {{-- Acciones --}}
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('directors.edit', $director) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                            ✏️ Editar
                        </a>

                        <a href="{{ route('directors.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            ⬅️ Volver
                        </a>
                    </div>
                </div>
            </div>

            {{-- Películas del director --}}
            <div>
                <h3 class="text-xl font-semibold mb-4">
                    🎥 Películas dirigidas
                </h3>

                @if ($director->movies->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($director->movies as $movie)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">

                        {{-- Poster --}}
                        <div class="h-64 bg-gray-100 flex items-center justify-center">
                            @if ($movie->poster)
                            <img src="{{ asset('storage/' . $movie->poster) }}"
                                class="h-full w-full object-cover">
                            @else
                            <span class="text-gray-400 text-sm">Sin poster</span>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="p-4 space-y-1">
                            <h4 class="font-semibold text-lg truncate">
                                {{ $movie->title }}
                            </h4>

                            <p class="text-sm text-gray-600">
                                📅 {{ \Carbon\Carbon::parse($movie->release_date)->year }}
                            </p>

                            <p class="text-xs text-gray-500 line-clamp-3">
                                {{ $movie->description ?? 'Sin descripción' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500">
                    Este director no tiene películas registradas 🎬
                </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>