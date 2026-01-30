<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            ✏️ Editar Director
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8 bg-white shadow rounded p-6">

            <form action="{{ route('directors.update', $director) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nombre --}}
                <x-input-label for="name" value="Nombre" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    value="{{ old('name', $director->name) }}"
                    required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                {{-- Apellido --}}
                <x-input-label for="surname" value="Apellido" class="mt-4" />
                <x-text-input
                    id="surname"
                    name="surname"
                    type="text"
                    class="mt-1 block w-full"
                    value="{{ old('surname', $director->surname) }}"
                    required />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />

                {{-- Nacionalidad --}}
                <x-input-label for="nationality" value="Nacionalidad" class="mt-4" />
                <x-text-input
                    id="nationality"
                    name="nationality"
                    type="text"
                    class="mt-1 block w-full"
                    value="{{ old('nationality', $director->nationality) }}" />
                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />

                {{-- Fecha de nacimiento --}}
                <x-input-label for="birth_date" value="Fecha de nacimiento" class="mt-4" />
                <x-text-input
                    id="birth_date"
                    name="birth_date"
                    type="date"
                    class="mt-1 block w-full"
                    value="{{ old('birth_date', $director->birth_date) }}" />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />

                {{-- Biografía --}}
                <x-input-label for="biography" value="Biografía" class="mt-4" />
                <textarea
                    id="biography"
                    name="biography"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    {{ old('biography', $director->biography) }}
                </textarea>
                <x-input-error :messages="$errors->get('biography')" class="mt-2" />

                {{-- Foto actual --}}
                <div class="mt-4">
                    <x-input-label value="Foto actual" />

                    @if ($director->photo)
                        <img src="{{ asset('storage/' . $director->photo) }}"
                             class="h-32 w-32 object-cover rounded shadow mt-2">
                    @else
                        <p class="text-sm text-gray-500 mt-2">No hay foto</p>
                    @endif
                </div>

                {{-- Nueva foto --}}
                <x-input-label for="photo" value="Cambiar foto" class="mt-4" />
                <x-text-input
                    id="photo"
                    name="photo"
                    type="file"
                    class="mt-1 block w-full"
                    accept="image/*" />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                {{-- Botones --}}
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('directors.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        ⬅️ Cancelar
                    </a>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        💾 Actualizar Director
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
