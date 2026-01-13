@auth

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <div class="ml-4 text-xl font-bold">🎬Sistema de gestión de cine</div>

            <!-- Menú principal -->
            <div class="hidden sm:flex sm:space-x-8 sm:ml-10">

                <!-- Dashboard -->
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Inicio
                </x-nav-link>

                <!-- Actores ▼ -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none">
                        Actores
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.585l3.71-3.396a.75.75 0 111.02 1.1l-4.25 3.895a.75.75 0 01-1.02 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <x-dropdown-link :href="route('actors.index')">Todos los actores</x-dropdown-link>
                            <x-dropdown-link :href="route('actors.create')">Nuevo actor</x-dropdown-link>
                        </div>
                    </div>
                </div>

                <!-- Directores ▼ -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none">
                        Directores
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.585l3.71-3.396a.75.75 0 111.02 1.1l-4.25 3.895a.75.75 0 01-1.02 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <x-dropdown-link :href="route('directors.index')">Todos los directores</x-dropdown-link>
                            <x-dropdown-link :href="route('directors.create')">Nuevo director</x-dropdown-link>
                        </div>
                    </div>
                </div>

                <!-- Películas ▼ -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none">
                        Peliculas
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.585l3.71-3.396a.75.75 0 111.02 1.1l-4.25 3.895a.75.75 0 01-1.02 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <x-dropdown-link :href="route('movies.index')">Todas las películas</x-dropdown-link>
                            <x-dropdown-link :href="route('movies.create')">Nueva película</x-dropdown-link>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Usuario / logout -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.585l3.71-3.396a.75.75 0 111.02 1.1l-4.25 3.895a.75.75 0 01-1.02 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Cerrar sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>
</nav>

@endauth
