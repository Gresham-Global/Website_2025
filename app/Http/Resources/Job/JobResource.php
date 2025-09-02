<?php
namespace App\Http\Resources\Job;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Common\ImageController; 

class JobResource extends JsonResource
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
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'interest_description' => $this->interest_description, 
            'role_description' => $this->role_description,
            'resume' => $this->resume,
            'career_title' => $this->career?->title, // Fetch career title safely
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => $this->status,
        ];
    }
}
