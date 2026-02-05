<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\EstadioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\EquipoController;
use App\Http\Controllers\Api\PartidoController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('jugadoras', [JugadoraController::class, 'index']);
Route::get('jugadoras/{jugadora}', [JugadoraController::class, 'show']);

Route::get('estadios', [EstadioController::class, 'index']);
Route::get('estadios/{estadio}', [EstadioController::class, 'show']);

Route::get('equipos', [EquipoController::class, 'index']);
Route::get('equipos/{equipo}', [EquipoController::class, 'show']);

Route::get('partidos', [PartidoController::class, 'index']);
Route::get('partidos/{partido}', [PartidoController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('jugadoras', [JugadoraController::class, 'store']);
    Route::put('jugadoras/{jugadora}', [JugadoraController::class, 'update']);
    Route::delete('jugadoras/{jugadora}', [JugadoraController::class, 'destroy']);

    Route::post('estadios', [EstadioController::class, 'store']);
    Route::put('estadios/{estadio}', [EstadioController::class, 'update']);
    Route::delete('estadios/{estadio}', [EstadioController::class, 'destroy']);

    Route::post('equipos', [EquipoController::class, 'store']);
    Route::put('equipos/{equipo}', [EquipoController::class, 'update']);
    Route::delete('equipos/{equipo}', [EquipoController::class, 'destroy']);

     Route::post('partidos', [PartidoController::class, 'store']);
    Route::put('partidos/{partido}', [PartidoController::class, 'updateResultado']);
    Route::delete('partidos/{partido}', [PartidoController::class, 'destroy']);

    

    Route::get('user', [ProfileController::class, 'show']);
});
