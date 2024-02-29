<?php

namespace App\Http\Resources\Api\v2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'socio' => $this->socio->nombre,
            'pista' => $this->pista->numero,
            'reserva_confirmada' => $this->socio_id ? true : false,
        ];
    }
}
