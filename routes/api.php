<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\EstadioController;
use App\Http\Controllers\ProfileController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('jugadoras', [JugadoraController::class, 'index']);
Route::get('jugadoras/{jugadora}', [JugadoraController::class, 'show']);

Route::get('estadios', [EstadioController::class, 'index']);
Route::get('estadios/{estadio}', [EstadioController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('jugadoras', [JugadoraController::class, 'store']);
    Route::put('jugadoras/{jugadora}', [JugadoraController::class, 'update']);
    Route::delete('jugadoras/{jugadora}', [JugadoraController::class, 'destroy']);

    Route::post('estadios', [EstadioController::class, 'store']);
    Route::put('estadios/{estadio}', [EstadioController::class, 'update']);
    Route::delete('estadios/{estadio}', [EstadioController::class, 'destroy']);

    Route::get('user', [ProfileController::class, 'show']);
});
