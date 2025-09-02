<?php

namespace App\Http\Resources\Publications;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController;
// use App\Http\Requests\NewsAndBlogRequest;

class PublicationsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    // public function store(PublicationRequest $request)
    public function toArray(Request $request): array
    {
        // dd((new ImageController())->generatePresignedUrl($this->thumbnail_image));

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,

            'thumbnail_image' => $this->thumbnail_image,
            'thumbnailImagePath' => $this->thumbnail_image != null
                ? (new ImageController())->generatePresignedUrl($this->thumbnail_image)
                : null,

            'banner_image' => $this->banner_image,
            'bannerImagePath' => $this->banner_image != null
                ? (new ImageController())->generatePresignedUrl($this->banner_image)
                : null,

            'mb_banner_image' => $this->mb_banner_image,
            'bannerImagePath' => $this->mb_banner_image != null
                ? (new ImageController())->generatePresignedUrl($this->mb_banner_image)
                : null,

            'vertical_image' => $this->vertical_image,
            'verticalImagePath' => $this->vertical_image != null
                ? (new ImageController())->generatePresignedUrl($this->vertical_image)
                : null,

            'report_pdf' => $this->report_pdf,
            'reportPdfPath' => $this->report_pdf != null
                ? (new ImageController())->generatePresignedUrl($this->report_pdf)
                : null,

            'report_cards' => collect(json_decode($this->report_cards, true) ?: [])->map(function ($card) {
                return [
                    'report_title' => $card['report_title'] ?? null,
                    'report_image' => $card['report_image'] ?? null,
                    'report_image_url' => isset($card['report_image'])
                        ? (new ImageController())->generatePresignedUrl($card['report_image'])
                        : null,
                    'report_list' => $card['report_list'] ?? [],
                ];
            }),

            'key_highlights' => collect(json_decode($this->key_highlights, true) ?: [])->map(function ($item) {
                return [
                    'highlight_description' => $item['highlight_description'] ?? null,
                    'highlight_icon' => $item['highlight_icon'] ?? null,
                    'highlight_icon_url' => isset($item['highlight_icon'])
                        ? (new ImageController())->generatePresignedUrl($item['highlight_icon'])
                        : null,
                ];
            }),



            'tags' => $this->tags,
            'share_link' => $this->share_link,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => $this->status,
        ];
    }
}
