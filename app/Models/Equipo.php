<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'estadio_id', 'titulos'];

    /**
     * Cada equipo pertenece a un estadio
     */
    public function estadio()
    {
        return $this->belongsTo(Estadio::class);
    }

    /**
     * Relación: los partidos donde este equipo es local
     */
    public function partidosComoLocal()
    {
        return $this->hasMany(Partido::class, 'local_id');
    }

    /**
     * Relación: los partidos donde este equipo es visitante
     */
    public function partidosComoVisitante()
    {
        return $this->hasMany(Partido::class, 'visitante_id');
    }
}
