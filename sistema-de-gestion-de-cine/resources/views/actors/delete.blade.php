<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-600">
            🗑️ Eliminar actor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6 text-center">

            <p class="text-lg mb-4">
                ¿Estás seguro de que deseas eliminar este actor
                <strong>{{ $actor->name }}</strong>?
            </p>

            <p class="text-gray-500 mb-6">
                Esta acción no se puede deshacer.
            </p>

            <form method="POST" action="{{ route('actors.destroy', $actor) }}">
                @csrf
                @method('DELETE')

                <div class="flex justify-center gap-4">
                    <a href="{{ route('actors.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">
                        Cancelar
                    </a>

                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        🗑️ Eliminar
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>