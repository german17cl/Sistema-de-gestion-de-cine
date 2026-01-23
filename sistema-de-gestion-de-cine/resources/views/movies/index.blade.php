<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎬 Películas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- Botón crear --}}
            <div class="flex justify-end mb-6">
                <div class="mt-6 px-6   flex flex-1 justify-start">
                    {{ $movies->links('pagination::tailwind') }}
                </div>

                <a href="{{ route('movies.create') }}"
                    class="bg-blue-600 flex hover:bg-blue-700 items-center text-white px-4 py-2 rounded shadow">
                    ➕ Nueva película
                </a>
                
            </div>
            
            {{-- Tabla --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                

                <table class="w-full divide-y divide-gray-200 ">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Poster
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Título
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Director
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Año
                            </th>
                            <th class="px-6 py-3  text-right text-xs font-medium text-gray-500 uppercase">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($movies as $movie)
                        <tr>
                            {{-- Poster --}}
                            <td class="px-6 py-4 align-middle">
                                @if ($movie->poster)
                                <div class="flex items-center justify-center h-24 w-20 overflow-hidden rounded shadow">
                                    <img src="{{ asset('storage/' . $movie->poster) }}"
                                        class="max-h-full max-w-full object-contain">
                                </div>
                                @else
                                <div class="flex items-center justify-center h-24 w-20 bg-gray-200 rounded text-xs text-gray-500">
                                    N/A
                                </div>
                                @endif
                            </td>



                            {{-- Título --}}
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $movie->title }}
                            </td>

                            {{-- Director --}}
                            <td class="px-6 py-4 text-gray-600">
                                {{ $movie->director->nombre ?? '—' }}
                            </td>

                            {{-- Año --}}
                            <td class="px-6 py-4 text-gray-600">
                                {{ $movie->release_date }}
                            </td>

                            {{-- Acciones --}}
                            <td class="px-6 py-4 text-right flex items-center  justify-end gap-3">
                                <a href="{{ route('movies.show', $movie) }}"
                                    class="bg-blue-600 text-white hover:underline hover:bg-blue-700  px-4 py-2 rounded shadow">
                                    Ver
                                </a>

                                <a href="{{ route('movies.edit', $movie) }}"
                                    class="text-yellow-600 hover:underline bg-yellow-100 px-4 py-2 rounded shadow   ">
                                    Editar
                                </a>

                                <a href="{{ route('movies.delete', $movie) }}"
                                    class="text-red-600 hover:underline bg-red-100 px-4 py-2 rounded shadow   ">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                No hay películas registradas 🎥
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>