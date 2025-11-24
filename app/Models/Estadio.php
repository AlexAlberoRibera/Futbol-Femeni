<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    use HasFactory;
    protected $table = 'estadios';

    protected $fillable = ['nombre', 'ciudad', 'capacidad']; // agrega ciudad si quieres
    /**
     * Un estadio puede tener muchos equipos
     */
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
