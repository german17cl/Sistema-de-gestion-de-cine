<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            ➕ Nuevo Actor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8 bg-white shadow rounded p-6">

            <form action="{{ route('actors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input-label for="name" value="Nombre" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <x-input-label for="surname" value="Apellido" class="mt-4"/>
                <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" value="{{ old('surname') }}" required />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />

                <x-input-label for="nationality" value="Nacionalidad" class="mt-4"/>
                <x-text-input id="nationality" name="nationality" type="text" class="mt-1 block w-full" value="{{ old('nationality') }}" required />
                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />

                <x-input-label for="biography" value="Biografía" class="mt-4"/>
                <textarea id="biography" name="biography" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required>{{ old('biography') }}</textarea>
                <x-input-error :messages="$errors->get('biography')" class="mt-2" />


                <x-input-label for="birth_date" value="Fecha de nacimiento" class="mt-4"/>
                <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" value="{{ old('birth_date') }}" required />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />

                

                <x-input-label for="photo" value="Foto" class="mt-4"/>
                <input
                    id="photo"
                    name="photo"
                    type="file"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                />

                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                



                <button type="submit" class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Guardar Actor
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
