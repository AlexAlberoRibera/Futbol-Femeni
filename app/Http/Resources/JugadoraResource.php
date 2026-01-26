<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JugadoraResource extends JsonResource
{
    public function toArray($request)
    {
         return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'equipo' => $this->equipo,
            'posicion' => $this->posicion,
            'dorsal' => $this->dorsal,
            'edad' => $this->edad,
        ];
    }
}
