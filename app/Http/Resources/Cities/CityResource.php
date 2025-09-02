<?php

namespace App\Http\Resources\Cities;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController;

class CityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'event_id' => $this->event_id,
            'city_name' => $this->city_name,
            'state' => $this->state,  // Include state here
            'country' => $this->country, // Include country here
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'images' => CityImageResource::collection($this->whenLoaded('images')), // Ensure the 'images' relation is loaded
        ];
    }
}
