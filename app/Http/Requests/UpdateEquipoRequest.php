<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipoRequest extends FormRequest
{
    public function authorize()
    {
        // Solo admin o manager de ese equipo
        return auth()->user()->role === 'admin' || auth()->user()->team_id == $this->equipo->id;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:3',
            'titulos' => 'sometimes|integer|min:0',
            'estadio_id' => 'required|exists:estadios,id',
            'escudo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // 👈 opcional
        ];
    }
}
