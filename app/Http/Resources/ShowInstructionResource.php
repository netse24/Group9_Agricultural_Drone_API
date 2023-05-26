<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowInstructionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'instruction' =>$this->instruction,
            'drone'=>new ShowDroneResource($this->drone),
            'plan'=>new ShowPlanResource($this->plan)
        ];
    }
}
