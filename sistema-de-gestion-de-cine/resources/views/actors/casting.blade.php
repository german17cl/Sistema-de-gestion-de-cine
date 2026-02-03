<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold">
            🎭 Casting de {{ $actor->name }} {{ $actor->surname }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">

            <form action="{{ route('actors.casting.store', $actor) }}" method="POST">
                @csrf

                <h3 class="text-lg font-semibold mb-4">
                    Selecciona películas y asigna rol
                </h3>

                <div class="space-y-4">
                    @foreach($movies as $movie)
                    <div class="flex items-center gap-4">

                        {{-- Checkbox --}}
                        <input type="checkbox"
                            name="movies[]"
                            value="{{ $movie->id }}"
                            {{ $actor->movies->contains($movie->id) ? 'checked' : '' }}>

                        <span class="flex-1 font-medium">
                            {{ $movie->title }}
                        </span>

                        {{-- Rol --}}
                        <input type="text"
                            name="roles[{{ $movie->id }}]"
                            placeholder="Rol / Personaje"
                            value="{{ data_get($actor->movies->find($movie->id), 'pivot.role') }}"
                            class="border rounded px-2 py-1 w-48">
                    </div>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('actors.show', $actor) }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Cancelar
                    </a>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        💾 Guardar Casting
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>