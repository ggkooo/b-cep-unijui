<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactInfoResource extends JsonResource
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
            'institution_name' => $this->institution_name,
            'address' => $this->address,
            'city_state_zip' => $this->city_state_zip,
            'phone' => $this->phone,
            'email' => $this->email,
            'service_hours' => $this->service_hours,
        ];
    }
}
