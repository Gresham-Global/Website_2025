<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OurValues extends Component
{
    public $image;
    public $values;
    public $page;

    public function __construct($image = null, $values = null, $page = null)
    {
        $this->image = $image;
        $this->page = $page;

        // Default values
        $defaultValues = [
            [
                'title' => 'COMMITMENT',
                'icon' => 'website/assets/images/ourvalues/commitment-icon.webp',
                'description' => 'Aligning with your goals to ensure success',
            ],
            [
                'title' => 'COMPLIANCE',
                'icon' => 'website/assets/images/ourvalues/compliance-icon.webp',
                'description' => 'Ensuring adherence to regulations, policies, and ethical standards',
            ],
            [
                'title' => 'GROWTH',
                'icon' => 'website/assets/images/ourvalues/growth-icon.webp',
                'description' => 'Expanding visibility, numbers, and impact across South Asia',
            ],
            [
                'title' => 'QUALITY',
                'icon' => 'website/assets/images/ourvalues/quality-icon.webp',
                'description' => 'Maintaining high standards in recruitment, partnerships, and collaboration',
            ],
            [
                'title' => 'TRANSPARENCY',
                'icon' => 'website/assets/images/ourvalues/transparency-icon.webp',
                'description' => 'Maintaining clear communication and accountability',
            ],
        ];

        // Page-specific values
        $pageValues = [
            'careers' => [
                [
                'title' => 'COMMITMENT',
                'icon' => 'website/assets/images/ourvalues/commitment-icon.webp',
                'description' => 'We are committed to each other’s success, fostering a supportive and collaborative culture',
            ],
            [
                'title' => 'COMPLIANCE',
                'icon' => 'website/assets/images/ourvalues/compliance-icon.webp',
                'description' => 'Integrity is non-negotiable—we follow all regulations and best practices to create a secure and trustworthy workplace',
            ],
            [
                'title' => 'GROWTH',
                'icon' => 'website/assets/images/ourvalues/growth-icon.webp',
                'description' => 'Your development matters. We support continuous learning and offer opportunities to grow with us',
            ],
            [
                'title' => 'QUALITY',
                'icon' => 'website/assets/images/ourvalues/quality-icon.webp',
                'description' => 'We are committed to delivering the highest standards in our work, continuously striving for improvement and innovation',
            ],
            [
                'title' => 'TRANSPARENCY',
                'icon' => 'website/assets/images/ourvalues/transparency-icon.webp',
                'description' => 'We act with honesty and transparency in all that we do, ensuring trust and respect across every interaction',
            ],
            ],

        ];

        // Priority:
        // 1. Explicitly passed values
        // 2. Page-based values
        // 3. Default values
        $this->values = $values
            ?? ($page && isset($pageValues[$page]) ? $pageValues[$page] : $defaultValues);
    }

    public function render()
    {
        return view('components.our-values');
    }
}
