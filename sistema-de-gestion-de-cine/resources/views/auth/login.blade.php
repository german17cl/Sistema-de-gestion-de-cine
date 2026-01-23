<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-lg shadow">

        {{-- Header --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                🎬 Sistema de Cine
            </h1>
            <p class="text-gray-500 mt-1">
                Inicia sesión para administrar el contenido
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

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
                    autofocus />
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
                    required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                    <span class="ml-2 text-gray-600">Recordarme</span>
                </label>

                @if (Route::has('password.request'))
                <a class="text-blue-600 hover:underline"
                    href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
                @endif
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded shadow hover:bg-blue-700 transition">
                🔐 Iniciar sesión
            </button>
        </form>

        {{-- Footer --}}
        <div class="mt-6 text-center text-sm text-gray-500">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                Regístrate
            </a>
        </div>
    </div>
</x-guest-layout>