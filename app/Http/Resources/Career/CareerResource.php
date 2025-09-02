<?php
namespace App\Http\Resources\Career;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController; 

class CareerResource extends JsonResource
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
            'cover_image' => $this->cover_image != null , 
            'coverImagePath' => $this->cover_image != null ? (new ImageController())->generatePresignedUrl($this->cover_image)  : null, 
            // 'education_experience_card' => $this->education_experience_card,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => $this->status,
        ];
    }
}
