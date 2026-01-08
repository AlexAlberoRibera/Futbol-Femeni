<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estadio;
use App\Models\Partido;
use App\Models\Jugadora;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'titulos',
        'estadio_id',
        'user_id',
        'escut', // ruta del escudo
    ];

    // Relación con el estadio
    public function estadio()
    {
        return $this->belongsTo(Estadio::class);
    }

    // Partidos donde el equipo es local
    public function partidosComoLocal()
    {
        return $this->hasMany(Partido::class, 'local_id');
    }

    // Partidos donde el equipo es visitante
    public function partidosComoVisitante()
    {
        return $this->hasMany(Partido::class, 'visitante_id');
    }

    // Jugadoras del equipo
    public function jugadoras()
    {
        return $this->hasMany(Jugadora::class);
    }
}
