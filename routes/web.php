<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartidoController;

Route::get('/',fn()=>"¡Bienvenidos a la Guia de Equipos de Futbol Fememnino!");
Route::resource('equipos',EquipoController::class);
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');


Route::get('/estadios', [EstadioController::class, 'index'])->name('estadios.index');
Route::get('/estadios/create', [EstadioController::class, 'create'])->name('estadios.create');
Route::post('/estadios', [EstadioController::class, 'store'])->name('estadios.store');
Route::get('/estadios/{id}', [EstadioController::class, 'show'])->name('estadios.show');


Route::get('/jugadoras', [JugadoraController::class, 'index'])->name('jugadoras.index');
Route::get('/jugadoras/crear', [JugadoraController::class, 'create'])->name('jugadoras.create');
Route::post('/jugadoras', [JugadoraController::class, 'store'])->name('jugadoras.store');


Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/crear', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');