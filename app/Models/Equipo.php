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

    public function jugadoras()
    {
        return $this->hasMany(Jugadora::class);
    }

    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}
