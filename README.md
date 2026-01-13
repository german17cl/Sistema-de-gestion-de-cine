📝 Pasos para configurar el Sistema de Gestión de Cine
1️⃣ Crear modelos y migraciones

Primero creamos los modelos con sus migraciones:

php artisan make:model Actor -m
php artisan make:model Director -m
php artisan make:model Movie -m
php artisan make:migration create_actor_movie_table


-m crea automáticamente la migración

create_actor_movie_table es la tabla pivot para la relación Actor ↔ Movie (N:M)

2️⃣ Rellenar las migraciones

Editamos las migraciones con los campos según los apuntes de la profesora:

actors

$table->id();
$table->string('name');
$table->string('surname');
$table->date('birth_date')->nullable();
$table->string('nationality')->nullable();
$table->text('biography')->nullable();
$table->string('photo')->nullable();
$table->timestamps();


directors

$table->id();
$table->string('name');
$table->string('surname');
$table->date('birth_date')->nullable();
$table->string('nationality')->nullable();
$table->text('biography')->nullable();
$table->string('photo')->nullable();
$table->timestamps();


movies

$table->id();
$table->string('title');
$table->text('description')->nullable();
$table->foreignId('director_id')->constrained()->onDelete('cascade');
$table->date('release_date');
$table->integer('duration');
$table->string('genre')->nullable();
$table->string('poster')->nullable();
$table->timestamps();


actor_movie (pivot)

$table->id();
$table->foreignId('actor_id')->constrained()->onDelete('cascade');
$table->foreignId('movie_id')->constrained()->onDelete('cascade');
$table->string('role')->nullable();
$table->timestamps();

3️⃣ Ejecutar migraciones
php artisan migrate


Si necesitas reiniciar la base de datos para ajustar columnas:

php artisan migrate:fresh

4️⃣ Crear controladores
php artisan make:controller ActorController --resource
php artisan make:controller DirectorController --resource
php artisan make:controller MovieController --resource
php artisan make:controller DashboardController


--resource crea los métodos CRUD automáticamente

5️⃣ Crear rutas

En routes/web.php:

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('actors', ActorController::class);
    Route::resource('directors', DirectorController::class);
    Route::resource('movies', MovieController::class);

    // Perfil usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

6️⃣ Instalar Laravel Breeze (Autenticación)
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run dev
php artisan migrate
php artisan serve


Esto nos da login, registro, recuperación de contraseña y layout base (<x-app-layout>)

7️⃣ Crear DashboardController

En DashboardController.php:

use App\Models\Actor;
use App\Models\Director;
use App\Models\Movie;

public function index()
{
    return view('dashboard', [
        'actorsCount' => Actor::count(),
        'directorsCount' => Director::count(),
        'moviesCount' => Movie::count(),
        'latestMovie' => Movie::orderBy('release_date', 'desc')->first(),
        'latestMovies' => Movie::latest()->take(5)->get(),
    ]);
}

8️⃣ Ajustar dashboard.blade.php

Envolver contenido con <x-app-layout>

Mostrar estadísticas (Actores, Directores, Películas, Último estreno)

Mostrar timeline con últimas 5 películas

9️⃣ Configurar menú de navegación (navigation.blade.php)

Menús desplegables para Actores, Directores y Películas

Nombre del usuario a la derecha (Auth::user()->name)

Dropdown para cerrar sesión

<x-dropdown>
    <x-slot name="trigger">{{ Auth::user()->name }}</x-slot>
    <x-slot name="content">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Logout
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>

10️⃣ Comprobaciones finales

Ejecutar php artisan route:list para verificar rutas

php artisan serve para probar la web

Entrar a /register o /login para autenticarse

Acceder a /dashboard → ver estadísticas y menú completo