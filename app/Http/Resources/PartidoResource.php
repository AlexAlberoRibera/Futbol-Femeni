<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartidoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'local' => [
                'id' => $this->local->id,
                'nombre' => $this->local->nombre,
                'ciudad' => $this->local->ciudad,
                'capacidad' => $this->local->capacidad,
            ],
            'visitante' => [
                'id' => $this->visitante->id,
                'nombre' => $this->visitante->nombre,
                'ciudad' => $this->visitante->ciudad,
                'capacidad' => $this->visitante->capacidad,
            ],
            'fecha' => $this->fecha->format('Y-m-d H:i'),
            'resultado' => $this->resultado,
            'arbitro' => $this->arbitro ? [
                'id' => $this->arbitro->id,
                'name' => $this->arbitro->name,
                'email' => $this->arbitro->email,
            ] : null,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i'),
        ];
    }
}
