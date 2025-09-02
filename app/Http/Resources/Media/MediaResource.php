<?php
namespace App\Http\Resources\Media;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController; 

class MediaResource extends JsonResource
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
            'thumbnail_image' => $this->thumbnail_image, 
            'logo_image' => $this->logo_image, 
            'thumbnailImagePath' => $this->thumbnail_image != null ? (new ImageController())->generatePresignedUrl($this->thumbnail_image)  : null, 
            'logoImagePath' => $this->logo_image != null ? (new ImageController())->generatePresignedUrl($this->logo_image)  : null, 
            'media_link' => $this->media_link,
            'publish_date' => $this->publish_date,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
