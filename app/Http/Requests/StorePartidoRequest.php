<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'equipo_local_id'   => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha'             => 'required|date',
            'estadio_id'        => 'required|exists:estadios,id',
            'arbitre_id'        => 'nullable|exists:users,id',
        ];
    }
}
