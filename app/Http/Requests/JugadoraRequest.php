<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;


class JugadoraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $minBirth = Carbon::now()->subYears(16)->format('Y-m-d');

        return [
            'nombre' => 'required|min:3',
            'equipo_id' => 'required|exists:equipos,id',
            'posicion' => 'required|in:Portera,Defensa,Mediocampista,Delantera',
            'fecha_nacimiento' => "required|date|before_or_equal:$minBirth",
            'foto'         => 'nullable|file|mimes:png|max:2048', // máximo 2MB
            'dorsal'       => 'required|integer|min:1',
            'goles'         => 'nullable|integer|min:0',
        ];
    }
}
