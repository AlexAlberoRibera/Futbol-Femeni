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
        'equipo_principal_id', // si existe la columna FK
    ];

    // Relación con equipo (opcional)
    public function equipoPrincipal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_principal_id');
    }
}
