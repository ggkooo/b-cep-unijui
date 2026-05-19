<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuidanceSectionResource extends JsonResource
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
            'title' => $this->title,
            'warning' => $this->warning,
            'important' => $this->important,
            'observation' => $this->observation,
            'sort_order' => $this->sort_order,
            'points' => GuidancePointResource::collection($this->whenLoaded('points')),
            'examples' => GuidanceExampleResource::collection($this->whenLoaded('examples')),
        ];
    }
}
