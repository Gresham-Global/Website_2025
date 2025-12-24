<?php

namespace App\Http\Resources\Life;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController;

class LifeResource extends JsonResource
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
            'slug' => $this->slug,
            'thumbnail_image' => $this->thumbnail_image,
            // 'thumbnailImagePath' => $this->thumbnail_image != null ? (new ImageController())->generatePresignedUrl($this->thumbnail_image)  : null,
            'thumbnailImagePath' => $this->thumbnail_image
                ? asset($this->thumbnail_image)
                : null,
            'status' => $this->status,
            'order' => $this->order,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
