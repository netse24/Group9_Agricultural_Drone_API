<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowDroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'drone_name' => $this->drone_name,
            'battery' => $this->battery,
            'payload' => $this->payload,
            'longToFamer' => new FarmerResource($this->farmer),
            'location' => new  LocationResource($this->location)
        ];
    }
}
