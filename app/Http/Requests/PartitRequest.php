<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartitRequest extends FormRequest
{
    public function authorize()
    {
        $partido = $this->route('partido');

        // Solo admin o árbitro asignado puede actualizar resultados
        return auth()->user()->role === 'admin'
            || ($partido && auth()->user()->role === 'arbitre' && auth()->user()->id === $partido->arbitre_id);
    }

    public function rules()
    {
        return [
            'resultado' => ['required', 'regex:/^\d+-\d+$/'], // formato 2-1
        ];
    }

    public function messages()
    {
        return [
            'resultado.regex' => 'El resultado debe tener el formato "GolesLocal-GolesVisitante" (ej: 2-1).',
        ];
    }
}
