<?php
namespace App\Http\Resources\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController; 

class EventResource extends JsonResource
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
            'short_description' => $this->short_description,
            'description' => $this->description, 
            'thumbnail_image' => $this->thumbnail_image, 
            'thumbnailImagePath' => $this->thumbnail_image != null ? (new ImageController())->generatePresignedUrl($this->thumbnail_image)  : null, 
            'video_link' => $this->video_link,
            'share_link' => $this->share_link,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
