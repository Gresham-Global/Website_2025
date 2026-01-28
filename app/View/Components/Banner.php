<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Banner extends Component
{
    public $title;
    public $image;
    public $alt;

    public function __construct($title = null, $image = null, $alt = null)
    {
        $this->title = $title;
        $this->image = $image;
        $this->alt = $alt ?? $title ?? 'Banner Image';
    }

    public function render()
    {
        return view('components.banner');
    }
}
