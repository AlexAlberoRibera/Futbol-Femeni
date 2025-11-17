<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartidoController;

Route::get('/',fn()=>"¡Bienvenidos a la Guia de Equipos de Futbol Fememnino!");
Route::resource('equipos',EquipoController::class);


Route::resource('/estadios', EstadioController::class);
/*
Route::get('/jugadoras', [JugadoraController::class, 'index'])->name('jugadoras.index');
Route::get('/jugadoras/crear', [JugadoraController::class, 'create'])->name('jugadoras.create');
Route::post('/jugadoras', [JugadoraController::class, 'store'])->name('jugadoras.store');


Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/crear', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
*/