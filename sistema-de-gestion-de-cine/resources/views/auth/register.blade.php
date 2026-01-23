<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-lg shadow">

        {{-- Header --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                🎬 Sistema de Cine
            </h1>
            <p class="text-gray-500 mt-1">
                Crea tu cuenta para comenzar
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="name" value="Nombre" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" value="Contraseña" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" value="Confirmar contraseña" />
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-green-600 text-white py-2 rounded shadow hover:bg-green-700 transition">
                📝 Crear cuenta
            </button>
        </form>

        {{-- Footer --}}
        <div class="mt-6 text-center text-sm text-gray-500">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                Inicia sesión
            </a>
        </div>
    </div>
</x-guest-layout>
