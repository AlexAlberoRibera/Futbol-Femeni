<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'visitante_id',
        'fecha',
        'resultado',
    ];

    /**
     * Equipo local
     */
    public function local()
    {
        return $this->belongsTo(Equipo::class, 'local_id');
    }

    /**
     * Equipo visitante
     */
    public function visitante()
    {
        return $this->belongsTo(Equipo::class, 'visitante_id');
    }
}
