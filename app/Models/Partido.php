<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'visitante_id',
        'fecha',
        'resultado',
        'arbitre_id', // si quieres controlar quién modifica
    ];

    // equipo local
    public function local()
    {
        return $this->belongsTo(equipo::class, 'local_id');
    }

    // equipo visitante
    public function visitante()
    {
        return $this->belongsTo(equipo::class, 'visitante_id');
    }
}
