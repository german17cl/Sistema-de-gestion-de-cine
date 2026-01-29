<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                🎭 Actores
            </h2>

            <a href="{{ route('actors.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                        ➕ Nuevo actor
            </a>
        </div>    
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- Header acciones --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    {{ $actors->links('pagination::tailwind') }}
                </div>

                
            </div>

            {{-- Tabla --}}
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Foto
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Nombre
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Nacionalidad
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Año nacimiento
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($actors as $actor)
                        <tr class="hover:bg-gray-50">

                            {{-- Foto redonda --}}
                            <td class="px-6 py-4">
                                @if ($actor->photo)
                                <img
                                    src="{{ asset('storage/' . $actor->photo) }}"
                                    alt="{{ $actor->name }}"
                                    class="h-14 w-14 rounded-full object-cover border shadow">
                                @else
                                <div class="h-14 w-14 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500">
                                    N/A
                                </div>
                                @endif
                            </td>

                            {{-- Nombre --}}
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $actor->name }}
                            </td>

                            {{-- Nacionalidad --}}
                            <td class="px-6 py-4 text-gray-600">
                                {{ $actor->nationality }}
                            </td>

                            {{-- Año nacimiento --}}
                            <td class="px-6 py-4 text-gray-600">
                                <!--Mostrar en formato Y-M-D-->

                                {{ \Carbon\Carbon::parse($actor->birth_date)->format('Y-m-d') }}
                            </td>

                            {{-- Acciones --}}
                            <td class="px-6 py-4 text-right flex justify-end gap-2">
                                <a href="{{ route('actors.show', $actor) }}"
                                    class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                                    Ver
                                </a>

                                <a href="{{ route('actors.edit', $actor) }}"
                                    class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded text-sm hover:bg-yellow-200">
                                    Editar
                                </a>

                                <a href="{{ route('actors.delete', $actor) }}"
                                    class="bg-red-100 text-red-700 px-3 py-1 rounded text-sm hover:bg-red-200">
                                    Eliminar
                                </a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                No hay actores registrados 🎬
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>