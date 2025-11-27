<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Jugadora extends Model
{
    protected $fillable = [
        'nombre',
        'dorsal',
        'posicion',
        'foto',
        'fecha_nacimiento',
        'equipo_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function getEdadAttribute()
    {
        return Carbon::parse($this->fecha_nacimiento)->age;
    }
}
