<?php

namespace App\View\Components;

use App\Models\Banner;
use Illuminate\View\Component;

class BannerSection extends Component
{
    public $type;
    public $title;
    public $banner;

    public function __construct($type, $title = null)
    {
        $this->type = $type;
        $this->title = $title;

        $this->banner = Banner::where('banner_type', $type)
            ->where('status', 1)
            ->orderBy('order', 'ASC')
            ->first();
    }

    public function render()
    {
        return view('components.banner-section');
    }
}
