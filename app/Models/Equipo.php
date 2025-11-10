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
}
