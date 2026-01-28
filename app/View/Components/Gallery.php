<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Gallery extends Component
{
    public $images;

    /**
     * Create a new component instance.
     *
     * @param array|string $images
     */
    public function __construct($images = [])
    {
        // If JSON string, decode it to array
        if (is_string($images)) {
            $images = json_decode($images, true);
        }

        // Ensure it's an array
        $this->images = is_array($images) ? $images : [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.gallery');
    }
}
