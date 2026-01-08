<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Jugadora extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'equipo_id',
        'posicion',
        'foto', // imagen en base64 o ruta
    ];

    // Relación con equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
