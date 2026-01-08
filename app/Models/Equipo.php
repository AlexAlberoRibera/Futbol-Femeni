<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre',
        'titulos',
        'estadio_id',
        'user_id',
    ];

    public function estadio()
    {
        return $this->belongsTo(Estadio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
