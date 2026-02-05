<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResultadoPartidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = auth()->user();
        $partido = $this->route('partido');

        return $user
            && (
                $user->role === 'admin'
                || ($user->role === 'arbitre' && $partido && $user->id === $partido->arbitre_id)
            );
    }

    public function rules(): array
    {
        return [
            'resultado' => ['required', 'regex:/^\d+-\d+$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'resultado.regex' =>
                'El resultado debe tener el formato "GolesLocal-GolesVisitante" (ej: 2-1).',
        ];
    }
}
