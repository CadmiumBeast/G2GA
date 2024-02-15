<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Booking */
class BookingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'Pc_Name' => $this->Pc_Name,
            'Pc_Price' => $this->Pc_Price,
            'StartTime' => $this->StartTime,
            'EndTime' => $this->EndTime,
            'User_Name' => $this->User_Name,
            'duration' => $this->duration,
        ];
    }
}
