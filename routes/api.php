<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProfileController;

// Rutas públicas de autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Rutas públicas de consulta de jugadoras
Route::get('jugadoras', [JugadoraController::class, 'index']);
Route::get('jugadoras/{jugadora}', [JugadoraController::class, 'show']);

// Rutas protegidas (requieren token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // CRUD completo de jugadoras
    Route::post('jugadoras', [JugadoraController::class, 'store']);
    Route::put('jugadoras/{jugadora}', [JugadoraController::class, 'update']);
    Route::delete('jugadoras/{jugadora}', [JugadoraController::class, 'destroy']);

    // Perfil de usuario
    Route::get('/user', [ProfileController::class, 'show']);
});
