<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            ✏️ Editar película
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                action="{{ route('movies.update', $movie) }}"
                enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')
                


                {{-- Título --}}
                <div>
                    <label class="block font-medium">Título</label>
                    <input type="text" name="title"
                        value="{{ old('title', $movie->title) }}"
                        class="w-full border rounded px-3 py-2">
                </div>
                
                {{-- Director --}}
                <div>
                    <label class="block font-medium">Director</label>
                    <select name="director_id" class="w-full border rounded px-3 py-2">
                        @foreach ($directors as $director)
                            <option value="{{ $director->id }}"
                                @selected(old('director_id', $movie->director_id) == $director->id)>
                                {{ $director->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Descripción --}}
                <div>
                    <label class="block font-medium">Descripción</label>
                    <textarea name="description"
                        class="w-full border rounded px-3 py-2"
                        rows="4">{{ old('description', $movie->description) }}</textarea>
                </div>

                {{-- Fecha --}}
                <div>
                    <label class="block font-medium">Fecha de estreno</label>
                    <input type="date" name="release_date"
                        value="{{ old('release_date', $movie->release_date) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- Duración --}}
                <div>
                    <label class="block font-medium">Duración (min)</label>
                    <input type="number" name="duration"
                        value="{{ old('duration', $movie->duration) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- Género --}}
                <div>
                    <label class="block font-medium">Género</label>
                    <input type="text" name="genre"
                        value="{{ old('genre', $movie->genre) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- Poster --}}
                <div>
                    <label class="block font-medium">Poster</label>
                    <input type="file" name="poster" class="w-full">
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3">
                    <a href="{{ route('movies.show', $movie) }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">
                        Cancelar
                    </a>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        💾 Guardar cambios
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>