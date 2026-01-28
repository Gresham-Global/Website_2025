<?php

namespace App\Http\Resources\NewsAndBlogs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController;
// use App\Http\Requests\NewsAndBlogRequest;

class NewsBlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    // public function store(NewsAndBlogRequest $request)
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'thumbnail_image' => $this->thumbnail_image,
            'template' => $this->template,
            'banner_image' => $this->banner_image != null ? (new ImageController())->generatePresignedUrl($this->banner_image)  : null,
            'gallery_images' => $this->gallery_images,
            'thumbnailImagePath' => $this->thumbnail_image != null ? (new ImageController())->generatePresignedUrl($this->thumbnail_image)  : null,
            'type'=> $this->type,
            'published_date' => $this->published_date,
            'share_link' => $this->share_link,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => $this->status,
        ];
    }
}
