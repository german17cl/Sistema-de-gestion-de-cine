<x-app-layout>
    <x-slot name="header">
        <nav class="flex items-center justify-between">
            {{-- Izquierda: Logo / título --}}
            <div class="flex flex-col">
                <h2 class="font-semibold text-2xl text-gray-800">
                    🎬 Sistema de Gestión de Cine
                </h2>
                <span class="text-sm text-gray-500">
                    Administra películas, directores y funciones
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

    <div class="py-12">
        <div class="max-w-4xl mx-auto text-center">
            <p class="text-gray-600">
                Bienvenido al sistema 🎥
            </p>
        </div>
    </div>
</x-app-layout>