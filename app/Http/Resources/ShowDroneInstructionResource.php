<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowDroneInstructionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'drone_name' => $this->drone_name,
            'battery' => $this->battery,
            'payload' => $this->payload,
            // 'in' => $this->instruction_id,
            'instructions' =>   InstructionResource::collection($this->instructions)
        ];
    }
}
