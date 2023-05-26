<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type_job'=>$this->type_job,
            'date_time'=>$this->date_time,
            'area'=>$this->area,
            'user'=> new UserResource($this->user)
        ];
    }
}
