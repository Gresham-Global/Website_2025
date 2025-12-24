<?php

namespace App\Http\Resources\Seo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'page_name'       => $this->page_name,
            'page_url'         => $this->page_url,
            'meta_title'       => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords'    => $this->meta_keywords,
            'canonical_url'    => $this->canonical_url,
            'order'            => $this->order,
            'status'           => $this->status,
            'created_at'       => optional($this->created_at)->toDateTimeString(),
        ];
    }
}
