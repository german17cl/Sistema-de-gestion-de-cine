<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🗑️ Eliminar Director
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                ¿Estás seguro de eliminar este director?
            </h3>

            <div class="flex items-center gap-4 mb-6">
                @if ($director->photo)
                <img src="{{ asset('storage/' . $director->photo) }}"
                    class="h-20 w-20 rounded object-cover shadow">
                @endif

                <div>
                    <p class="font-medium">
                        {{ $director->name }} {{ $director->surname }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $director->nationality }}
                    </p>
                </div>
            </div>

            <p class="text-red-600 text-sm mb-6">
                ⚠️ Esta acción no se puede deshacer.
            </p>

            <div class="flex justify-end gap-3">
                <a href="{{ route('directors.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancelar
                </a>

                <form action="{{ route('directors.destroy', $director) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        🗑️ Eliminar
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>