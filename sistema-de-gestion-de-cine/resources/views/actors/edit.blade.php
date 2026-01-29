<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            ✏️ Editar Actor
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
                action="{{ route('actors.update', $actor) }}"
                enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')
                


                {{-- Título --}}
                <div>
                    <label class="block font-medium">Nombre</label>
                    <input type="text" name="name"
                        value="{{ old('name', $actor->name) }}"
                        class="w-full border rounded px-3 py-2">
                </div>
                
                {{-- Surname --}}
                <div>
                    <label class="block font-medium">Apellido</label>
                    <input type="text" name="surname"
                        value="{{ old('surname', $actor->surname) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- Fecha de nacimiento --}}
                <div>
                    <label class="block font-medium">Fecha de nacimiento</label>
                    <input type="date" name="birth_date"
                        value="{{ old('birth_date', $actor->birth_date) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- Biografía --}}
                <div>   
                    <label class="block font-medium">Biografía</label>
                    <textarea name="biography"
                        class="w-full border rounded px-3 py-2"
                        rows="4">{{ old('biography', $actor->biography) }}</textarea>
                </div>
                {{-- Nacionalidad --}}
                <div>
                    <label class="block font-medium">Nacionalidad</label>
                    <input type="text" name="nationality"
                        value="{{ old('nationality', $actor->nationality) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block font-medium">Foto</label>
                    <input type="file" name="photo" class="w-full">
                </div>
                

                
                {{-- Botones --}}
                <div class="flex justify-end gap-3">
                    <a href="{{ route('actors.index') }}"
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