<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\Seo\SeoResources;
use App\Models\Event;
use App\Models\News_and_Blogs;
use App\Models\Publication;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SeoController extends Controller
{

    /* ============================================================
        Admin SEO Index
    ============================================================ */

    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'SEO';

        return view('admin.seo.index', compact('title', 'heading'));
    }



    /* ============================================================
        Get All SEO (Datatable)
    ============================================================ */

    public function allSeo(Request $request)
    {
        try {

            $perPage = $request->input('length', 10);
            $search  = $request->input('search.value');
            $offset  = $request->input('start', 0);

            $sortColumn = 'id';
            $sortDirection = $request->input('sort_direction', 'asc');


            if ($request->has('sort_column')) {

                switch ($request->input('sort_column')) {

                    case 'pageUrl':
                        $sortColumn = 'page_url';
                        break;

                    case 'metaTitle':
                        $sortColumn = 'meta_title';
                        break;

                    case 'metaDescription':
                        $sortColumn = 'meta_description';
                        break;

                    case 'order':
                        $sortColumn = 'order';
                        break;
                }
            }


            // Get only valid URLs
            $validUrls = $this->getValidPageUrls();


            // Only valid SEO records
            $query = Seo::whereIn('page_url', $validUrls);


            $total = $query->count();


            // Search
            if (!empty($search)) {

                $query->where(function ($q) use ($search) {

                    $q->where('page_url', 'like', "%{$search}%")
                        ->orWhere('page_name', 'like', "%{$search}%")
                        ->orWhere('meta_title', 'like', "%{$search}%")
                        ->orWhere('meta_description', 'like', "%{$search}%")
                        ->orWhere('meta_keywords', 'like', "%{$search}%");
                });
            }


            $filtered = $query->count();


            $seos = $query
                ->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();


            return response()->json([

                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $filtered,
                'data' => SeoResources::collection($seos),

            ]);
        } catch (\Exception $e) {

            return response()->json([

                'draw' => $request->input('draw'),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage(),

            ]);
        }
    }



    /* ============================================================
        Get All Pages (Static + Dynamic)
    ============================================================ */

    private function getPages()
    {

        /* ================= Static ================= */

        $staticPages = [

            ['url' => '/', 'title' => 'Home'],
            ['url' => '/about', 'title' => 'About Us'],
            ['url' => '/approach', 'title' => 'Approach'],
            ['url' => '/research-assessment', 'title' => 'Research & Assessment'],
            ['url' => '/incountry-representation', 'title' => 'In-Country Representation'],
            ['url' => '/academic-collaborations', 'title' => 'Academic Collaborations'],
            ['url' => '/admission-compliance', 'title' => 'Admissions Compliance'],
            ['url' => '/strategic-marketing', 'title' => 'Strategic Marketing'],
            ['url' => '/operational-support', 'title' => 'Operational Support'],
            ['url' => '/media', 'title' => 'Media'],
            ['url' => '/news-and-blogs', 'title' => 'News and Blogs'],
            ['url' => '/publications', 'title' => 'Publications'],
            ['url' => '/events', 'title' => 'Events'],
            ['url' => '/careers', 'title' => 'Careers'],
            ['url' => '/contact', 'title' => 'Contact Us'],

        ];


        /* ================= Blogs ================= */

        $blogs = News_and_Blogs::where('status', 'Active')
            ->whereNull('deleted_by')
            ->select('slug', 'title')
            ->get()
            ->map(function ($item) {

                return [

                    'url'   => '/news-and-blogs/' . $item->slug,
                    'title' => $item->title,

                ];
            })
            ->toArray();


        /* ================= Publications ================= */

        $publications = Publication::where('status', 'Active')
            ->whereNull('deleted_by')
            ->select('slug', 'title')
            ->get()
            ->map(function ($item) {

                return [

                    'url'   => '/publications/' . $item->slug,
                    'title' => $item->title,

                ];
            })
            ->toArray();


        /* ================= Events ================= */

        $events = Event::where('status', 1)
            ->select('slug', 'title')
            ->get()
            ->map(function ($item) {

                return [

                    'url'   => '/events/' . $item->slug,
                    'title' => $item->title,

                ];
            })
            ->toArray();



        return [

            'static'       => $staticPages,
            'blogs'        => $blogs,
            'publications' => $publications,
            'events'       => $events,

        ];
    }



    /* ============================================================
        Get Valid URLs
    ============================================================ */

    private function getValidPageUrls()
    {
        return collect($this->getPages())
            ->flatten(1)
            ->pluck('url')
            ->toArray();
    }



    /* ============================================================
        Get Page Title
    ============================================================ */

    private function getPageTitle($url)
    {
        $pages = collect($this->getPages())->flatten(1);

        $page = $pages->firstWhere('url', $url);

        return $page['title'] ?? null;
    }



    /* ============================================================
        Create SEO
    ============================================================ */

    public function create()
    {

        $pages = $this->getPages();

        $existingPages = Seo::pluck('page_url')->toArray();


        foreach ($pages as $groupKey => $groupPages) {

            foreach ($groupPages as $index => $page) {

                $pages[$groupKey][$index]['disabled'] =
                    in_array($page['url'], $existingPages);
            }
        }


        $title = 'Create SEO at Gresham Global';
        $heading = 'SEO';

        return view('admin.seo.create', compact('title', 'heading', 'pages'));
    }



    /* ============================================================
        Store SEO
    ============================================================ */

    public function store(Request $request)
    {

        $request->validate([

            'page_url' => 'required|unique:seo,page_url',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

        ]);


        Seo::create([

            'page_url' => $request->page_url,
            'page_name' => $this->getPageTitle($request->page_url),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

        ]);


        return redirect()->route('admin.seo')
            ->with('success', 'SEO added successfully');
    }



    /* ============================================================
        Edit SEO
    ============================================================ */

    public function seo_edit(Seo $seo)
    {

        $pages = $this->getPages();


        $existingPages = Seo::where('id', '!=', $seo->id)
            ->pluck('page_url')
            ->toArray();


        foreach ($pages as $groupKey => $groupPages) {

            foreach ($groupPages as $index => $page) {

                $pages[$groupKey][$index]['disabled'] =
                    in_array($page['url'], $existingPages);
            }
        }


        $title = 'Edit SEO at Gresham Global';
        $heading = 'SEO';

        return view('admin.seo.edit', compact('seo', 'pages', 'title', 'heading'));
    }



    /* ============================================================
        Update SEO
    ============================================================ */

    public function seo_update(Request $request, Seo $seo)
    {

        $request->validate([

            'page_url' => 'required|unique:seo,page_url,' . $seo->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

        ]);


        $seo->update([

            'page_url' => $request->page_url,
            'page_name' => $this->getPageTitle($request->page_url),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

        ]);


        return redirect()->route('admin.seo')
            ->with('success', 'SEO updated successfully');
    }



    /* ============================================================
        Delete SEO
    ============================================================ */

    public function delete(Request $request)
    {

        $id = $request->input('id');


        try {

            $seo = Seo::find($id);


            if (!$seo) {

                return response()->json([
                    'success' => false,
                    'message' => 'SEO entry not found'
                ], 404);
            }


            if (auth()->check()) {

                $seo->deleted_by = auth()->id();
                $seo->save();
            }


            $seo->delete();


            return response()->json([
                'success' => true,
                'message' => 'SEO deleted successfully',
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }



    /* ============================================================
        Frontend SEO Display
    ============================================================ */

    public function seo_display(Request $request)
    {

        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);

        Paginator::currentPageResolver(fn() => $page);


        // Only valid URLs
        $validUrls = $this->getValidPageUrls();


        $seo = Seo::where('status', 1)
            ->whereIn('page_url', $validUrls)
            ->orderBy('order', 'asc')
            ->paginate($paginate_count);


        if ($request->ajax()) {

            $html = view('website.seo.seo_item', compact('seo'))->render();

            return response()->json([
                'html' => $html,
                'count' => $seo->count(),
            ]);
        }


        $total = Seo::where('status', 1)
            ->whereIn('page_url', $validUrls)
            ->count();


        return view('website.seo.seo', compact('seo', 'total'));
    }
}
