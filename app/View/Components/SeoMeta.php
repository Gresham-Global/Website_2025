<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Seo;

class SeoMeta extends Component
{
    public $title;
    public $description;
    public $keywords;
    public $canonical;
    public $og;
    public $pageUrl;

    /**
     * Create a new component instance.
     *
     * @param string|null $pageUrl
     */
    public function __construct($pageUrl = null)
    {
        // Determine current page URL, normalize leading slash
        $this->pageUrl = '/' . ltrim($pageUrl ?? request()->path(), '/');

        // Fetch exact match only
        $seo = Seo::where('page_url', $this->pageUrl)->first();

        // Dynamic defaults if no SEO record found
        $segments = request()->segments();
        $dynamicTitle = $segments
            ? implode(' - ', array_map(fn($s) => ucwords(str_replace('-', ' ', $s)), $segments)) . ' | Gresham Global'
            : 'International Student Recruitment in India | Gresham Global';

        $dynamicKeywords = $segments
            ? implode(', ', array_map(fn($s) => str_replace('-', ' ', $s), $segments))
            : 'international student recruitment India, higher education consultancy, India education agents, South Asia university recruitment, global admissions support, overseas education marketing';

        $this->title = $seo->meta_title ?? $dynamicTitle;
        $this->description = $seo->meta_description ?? 'Helping universities recruit students globally.';
        $this->keywords = $seo->meta_keywords ?? $dynamicKeywords;
        $this->canonical = url()->current();

        // Open Graph data
        $this->og = [
            'title' => $this->title,
            'description' => $this->description,
            'image' => $seo->og_image ?? null,
            'url' => $this->canonical,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.seo-meta');
    }
}
