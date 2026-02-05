<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
//use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ClasificacionController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación Breeze
require __DIR__ . '/auth.php';

// Rutas protegidas
Route::middleware('auth')->group(function () {

    // Equipos
    Route::resource('equipos', EquipoController::class);
    Route::get('/equipos/{equipo}/jugadoras', [EquipoController::class, 'jugadoras'])
        ->name('equipos.jugadoras');

    // Jugadoras
 //   Route::resource('jugadoras', JugadoraController::class);

    // Partidos - Rutas específicas ANTES del resource
    Route::get('partidos/historico', [PartidoController::class, 'historic'])
        ->name('partidos.historico');
    Route::get('calendario', [PartidoController::class, 'calendario'])
        ->name('partidos.calendario');
    Route::resource('partidos', PartidoController::class);

    // Estadios
    Route::resource('estadios', EstadioController::class);

    // Clasificación
    Route::get('/clasificacion', [ClasificacionController::class, 'index'])
        ->name('clasificacion.index');
});
