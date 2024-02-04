<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Computer */
class ComputerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Pc_Name' => $this->Pc_Name,
            'PC_IP' => $this->PC_IP,
            'Price' => $this->Price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
