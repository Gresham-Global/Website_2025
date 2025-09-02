<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\Publications\PublicationsResources;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TagController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming tags
        $request->validate([
            'tags' => 'required|array',
            'tags.*' => 'string|distinct', // Each tag must be a string and unique
        ]);

        $tags = [];

        foreach ($request->tags as $tagName) {
            // Check if the tag exists
            $tag = Tag::firstOrCreate(['slug' => \Str::slug($tagName)], ['name' => $tagName]);
            $tags[] = $tag->id;
        }

        return $tags;
    }
}
