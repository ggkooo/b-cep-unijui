<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'category' => $this->category,
            'role' => $this->role,
            'name' => $this->name,
            'education' => $this->education,
            'qualification' => $this->qualification,
            'notes' => $this->notes,
            'sort_order' => $this->sort_order,
        ];
    }
}
