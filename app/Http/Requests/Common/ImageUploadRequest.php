<?php

// app/Http/Requests/ImageUploadRequest.php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'image' => 'required|image|mimes:svg,jpeg,png,jpg,gif,webp|max:2048',
            'folder_name' => 'required|string',
        ];
        return $rules;
    }
} 
