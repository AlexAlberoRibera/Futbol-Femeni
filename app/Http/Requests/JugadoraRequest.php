<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class JugadoraRequest extends FormRequest
{
    public function authorize()
    {
        $jugadora = $this->route('jugadora'); // null si es create

        // Admin puede todo, manager solo sobre su equipo
        return auth()->user()->role === 'admin'
            || (auth()->user()->role === 'manager' && $jugadora && auth()->user()->team_id === $jugadora->equipo_id)
            || (auth()->user()->role === 'manager' && !$jugadora); // crear nueva jugadora
    }

    public function rules()
    {
        $minDate = Carbon::now()->subYears(16)->format('Y-m-d');

        return [
            'nombre' => 'required|string|min:3',
            'apellidos' => 'required|string|min:3',
            'equipo_id' => [
                'required',
                'integer',
                Rule::exists('equipos', 'id')
            ],
            'fecha_nacimiento' => "required|date|before_or_equal:$minDate",
            'dorsal' => 'required|integer|min:1',
            'goles' => 'nullable|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
