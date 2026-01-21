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
        'arbitro_id', // id del árbitro asignado
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'datetime',
        ];
    }

    // equipo local
    public function local()
    {
        return $this->belongsTo(Equipo::class, 'local_id');
    }

    // equipo visitante
    public function visitante()
    {
        return $this->belongsTo(Equipo::class, 'visitante_id');
    }

    // árbitro asignado
    public function arbitro()
    {
        return $this->belongsTo(\App\Models\User::class, 'arbitro_id');
    }
}
