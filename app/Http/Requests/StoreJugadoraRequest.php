<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJugadoraRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambia si quieres control de roles
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:3',
            'equipo_id' => 'required|exists:equipos,id',
            'posicion' => 'required|in:Portera,Defensa,Mediocampista,Delantera',
            'foto' => 'nullable|mimes:png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'foto.mimes' => 'Solo se permiten imágenes PNG.',
            'foto.max' => 'La imagen no puede superar los 2 MB.',
        ];
    }
}
