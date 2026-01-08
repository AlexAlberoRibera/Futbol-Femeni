<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Pàgina inicial
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

// Autentificación Breeze
require __DIR__ . '/auth.php';

// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {

    Route::resource('equipos', EquipoController::class);
    Route::get('/equipos/{equipo}/jugadoras', [EquipoController::class, 'jugadoras'])
        ->name('equipos.jugadoras');
    Route::resource('jugadoras', JugadoraController::class);

    Route::get('partidos', [PartidoController::class, 'index'])->name('partidos.index');

    // Solo actualitza resultados (solo arbitru asignado o admin)
    Route::put('partidos/{partido}/update-result', [PartidoController::class, 'updateResult'])
        ->name('partidos.updateResult');
    Route::resource('estadios', EstadioController::class);

});
