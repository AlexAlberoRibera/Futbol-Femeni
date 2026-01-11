<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; 
class StoreequipoRequest extends FormRequest
{
   public function authorize(): bool
{
    $user = Auth::user();
    return $user && $user->role === 'admin';
}

    public function rules(): array
    {
        return [
            'nombre'     => 'required|string|min:3',
            'titulos'    => 'required|integer|min:0',
            'estadio_id' => 'required|exists:estadios,id',
            'escut'      => 'nullable|image|mimes:png|max:2048',
        ];
    }
}
