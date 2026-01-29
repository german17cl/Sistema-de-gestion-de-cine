<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            ➕ Nueva Película
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8 bg-white shadow rounded p-6">

            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input-label for="title" value="Título" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />

                <x-input-label for="description" value="Descripción" class="mt-4"/>
                <textarea id="description" name="description" class="mt-1 block w-full border rounded p-2">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                <x-input-label for="release_date" value="Fecha de estreno" class="mt-4"/>
                <x-text-input id="release_date" name="release_date" type="date" class="mt-1 block w-full" value="{{ old('release_date') }}" required />
                <x-input-error :messages="$errors->get('release_date')" class="mt-2" />

                <x-input-label for="duration" value="Duración (min)" class="mt-4"/>
                <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full" value="{{ old('duration') }}" required />
                <x-input-error :messages="$errors->get('duration')" class="mt-2" />

                <x-input-label for="genre" value="Género" class="mt-4" />
                <select
                    id="genre"
                    name="genre"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                        focus:border-indigo-500 focus:ring-indigo-500"
                    required
                >
                    <option value="">— Selecciona un género —</option>

                    @php
                        $genres = [
                            'Acción',
                            'Aventura',
                            'Comedia',
                            'Drama',
                            'Ciencia ficción',
                            'Fantasía',
                            'Terror',
                            'Suspenso',
                            'Romance',
                            'Animación',
                            'Documental',
                            'Crimen',
                            'Musical',
                        ];
                    @endphp

                    @foreach ($genres as $genre)
                        <option value="{{ $genre }}"
                            {{ old('genre') === $genre ? 'selected' : '' }}>
                            {{ $genre }}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('genre')" class="mt-2" />

                <x-input-label for="poster" value="Poster" class="mt-4"/>
                <x-text-input id="poster" name="poster" type="file" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('poster')" class="mt-2" />

                <x-input-label for="director_id" value="Director" class="mt-4"/>
                <select id="director_id" name="director_id" class="mt-1 block w-full border rounded p-2" required>
                    @foreach ($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('director_id')" class="mt-2" />

                <x-input-label for="actors" value="Actores" class="mt-4"/>
                <select id="actors" name="actors[]" class="mt-1 block w-full border rounded p-2" multiple>
                    @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Guardar Película
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
