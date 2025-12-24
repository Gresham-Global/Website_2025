<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OurValues extends Component
{
    public $image;
    public $values;

    /**
     * Create a new component instance.
     *
     * @param string|null $image
     * @param array|null $values
     */
    public function __construct($image = null, $values = null)
    {
        $this->image = $image;

        $this->values = $values ?? [
            [
                'title' => 'COMMITMENT',
                'icon' => 'website/assets/images/ourvalues/commitment-icon.png',
                'description' => 'Aligning with your goals to ensure success',
            ],
            [
                'title' => 'COMPLIANCE',
                'icon' => 'website/assets/images/ourvalues/compliance-icon.png',
                'description' => 'Ensuring adherence to regulations, policies, and ethical standards',
            ],
            [
                'title' => 'GROWTH',
                'icon' => 'website/assets/images/ourvalues/growth-icon.png',
                'description' => 'Expanding visibility, numbers, and impact across South Asia',
            ],
            [
                'title' => 'QUALITY',
                'icon' => 'website/assets/images/ourvalues/quality-icon.png',
                'description' => 'Maintaining high standards in recruitment, partnerships, and collaboration',
            ],
            [
                'title' => 'TRANSPARENCY',
                'icon' => 'website/assets/images/ourvalues/transparency-icon.png',
                'description' => 'Maintaining clear communication and accountability',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.our-values');
    }
}
