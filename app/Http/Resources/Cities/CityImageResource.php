<?php

namespace App\Http\Resources\Cities;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController; 
// use App\Http\Requests\NewsAndBlogRequest;

class CityImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'image_path' => $this->image_path,
            'image_url'  => $this->image_path ? (new ImageController())->generatePresignedUrl($this->image_path) : null,
            'caption'    => $this->caption,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
