<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartidoController;

<<<<<<< HEAD
Route::get('/',fn()=>"¡Bienvenidos a la Guia de Equipos de Futbol Fememnino!");
Route::resource('equipos',EquipoController::class);
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
=======
>>>>>>> f0209ee (Laravel Breeze)

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/estadis', [EstadioController::class, 'index'])->name('estadios.index');
Route::get('/estadis/crear', [EstadioController::class, 'create'])->name('estadios.create');
Route::post('/estadis', [EstadioController::class, 'store'])->name('estadios.store');

Route::get('/jugadoras', [JugadoraController::class, 'index'])->name('jugadoras.index');
Route::get('/jugadoras/crear', [JugadoraController::class, 'create'])->name('jugadoras.create');
Route::post('/jugadoras', [JugadoraController::class, 'store'])->name('jugadoras.store');


Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/crear', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('equipos', EquipoController::class);
Route::get('/equipos/{equipo}/jugadoras', [EquipoController::class, 'jugadoras'])
    ->name('equipos.jugadoras');
Route::resource('jugadoras', JugadoraController::class);
Route::resource('partidos', PartidoController::class);
Route::resource('estadios', EstadioController::class);

>>>>>>> f0209ee (Laravel Breeze)
