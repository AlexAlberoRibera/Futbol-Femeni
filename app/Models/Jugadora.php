<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadora extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'equipo_id', 'posicion', 'foto'];

    // Relación con equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
