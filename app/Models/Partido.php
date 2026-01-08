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

    // Equipo local
    public function local()
    {
        return $this->belongsTo(Equipo::class, 'local_id');
    }

    // Equipo visitante
    public function visitante()
    {
        return $this->belongsTo(Equipo::class, 'visitante_id');
    }
}
