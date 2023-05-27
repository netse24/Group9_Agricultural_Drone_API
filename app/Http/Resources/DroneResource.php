<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name' => $this->drone_name,
            'battery' => $this->battery,
            'payload' => $this->payload,
            'user'=>new UserResource($this->user),
            'location' => new LocationResource($this->location),
            'instructions' => InstructionResource::collection($this->instructions)
        ];
    }
}
