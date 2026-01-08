<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad',
        'capacidad',
    ];

    // Relación: un estadio tiene muchos equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
