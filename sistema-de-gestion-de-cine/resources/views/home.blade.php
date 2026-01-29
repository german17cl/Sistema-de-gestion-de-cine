<x-app-layout>
    <x-slot name="header">
        <nav class="flex flex-col sm:flex-row items-center justify-between gap-4">
            {{-- Izquierda: Logo / título --}}
            <div class="flex flex-col">
                <h2 class="font-semibold text-2xl text-gray-800">
                    🎬 Sistema de Gestión de Cine
                </h2>
                <span class="text-sm text-gray-500">
                    Descubre las últimas películas y funciones
                </span>
            </div>

            {{-- Derecha: acciones --}}
            <div class="flex items-center gap-3">
                @guest
                <a href="{{ route('login') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700">
                    Registrarse
                </a>
                @endguest

                @auth
                <a href="{{ route('dashboard') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
                    Dashboard
                </a>
                @endauth
            </div>
        </nav>
    </x-slot>

    {{-- Hero / Bienvenida --}}
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center space-y-4">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenido al Sistema de Gestión de Cine 🎥</h1>
            <p class="text-gray-600">
                Explora las últimas películas disponibles. Inicia sesión para ver los detalles completos y gestionar tu cine.
            </p>
        </div>
    </div>

    {{-- Películas destacadas --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">🎬 Películas destacadas</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($movies as $movie)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
                    {{-- Poster --}}
                    <div class="h-64 bg-gray-100 flex items-center justify-center">
                        @if ($movie->poster)
                        <img src="{{ asset('storage/' . $movie->poster) }}"
                            class="h-full w-full object-cover"
                            alt="{{ $movie->title }}">
                        @else
                        <span class="text-gray-400 text-sm">Sin poster</span>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="p-4 space-y-1">
                        <h3 class="font-semibold text-lg text-gray-800 truncate">{{ $movie->title }}</h3>
                        <p class="text-sm text-gray-600">🎬 {{ $movie->director->name . ' ' . $movie->director->surname ?? '—' }}</p>
                        <p class="text-sm text-gray-500">📅 {{ \Carbon\Carbon::parse($movie->release_date)->format('Y-m-d') }}</p>
                        <p class="text-xs text-gray-500 truncate">🎭 {{ $movie->genre }}</p>
                    </div>

                    {{-- Botón para ver detalles --}}
                    <div class="px-4 pb-4">
                        @auth
                        <a href="{{ route('movies.show', $movie) }}"
                            class="block bg-blue-600 text-white py-2 rounded text-center text-sm hover:bg-blue-700">
                            Ver detalles
                        </a>
                        @else
                        <a href="{{ route('login') }}"
                            class="block bg-gray-500 text-white py-2 rounded text-center text-sm hover:bg-gray-600">
                            Inicia sesión para más
                        </a>
                        @endauth
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    No hay películas registradas aún 🎬
                </div>
                @endforelse
            </div>

            
        </div>
    </div>

    {{-- Categorías / géneros --}}
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Géneros populares</h2>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach ($genres as $genre)
                <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm cursor-pointer hover:bg-blue-200">
                    {{ $genre }}
                </span>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>