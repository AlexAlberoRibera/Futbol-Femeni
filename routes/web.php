<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ClasificacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard protegido con autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación Breeze
require __DIR__ . '/auth.php';

// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {

    // equipos
    Route::resource('equipos', EquipoController::class);
    Route::get('/equipos/{equipo}/jugadoras', [EquipoController::class, 'jugadoras'])
        ->name('equipos.jugadoras');

    // Jugadoras
    Route::resource('jugadoras', JugadoraController::class);

    // Partidos
    Route::middleware('auth')->group(function () {
        Route::resource('partidos', PartidoController::class);
    });
    Route::get('/historic', [PartidoController::class, 'historic'])->name('partidos.historic');


    // Estadios
    Route::resource('estadios', EstadioController::class);

    Route::get('/clasificacion', [ClasificacionController::class, 'index'])
        ->middleware('auth')
        ->name('clasificacion.index');
});
