<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_and_Blogs;
use App\Models\NewsCity;
use App\Models\Media;
use App\Http\Resources\NewsAndBlogs\NewsBlogsResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use App\Models\Seo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class NewsBlogsController extends Controller
{

    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'News and Blogs';
        return view('admin.newsandblog.index', compact('title', 'heading'));
    }

    public function homepage()
    {
        $news_and_blogs_for_slider = News_and_Blogs::where('status', 'Active')
            ->latest('published_date')
            ->take(5)
            ->get();
        $media_for_slider = Media::where('status', 1)->latest('publish_date')
            ->take(6) // or any number you want
            ->get();


        $title = 'Welcome to Gresham Global';

        // VERY IMPORTANT: Check this line
        return view('website.home', compact('news_and_blogs_for_slider', 'media_for_slider', 'title'));
        // If you accidentally did compact('news_and_blogs') here, then it would be correct.
        // But if you did compact('news_and_blogs_for_slider'), the view needs to use that name.
    }

    public function about()
    {
        $news_and_blogs_for_slider = News_and_Blogs::where('status', 'Active')
            ->latest('published_date')
            ->take(5)
            ->get();

        $media_for_slider = Media::where('status', 1)
            ->latest('publish_date')
            ->take(6)
            ->get();

        $title = 'About Gresham Global';

        return view('website.about', compact(
            'news_and_blogs_for_slider',
            'media_for_slider',
            'title'
        ));
    }


    public function allNewsAndBlog(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 6);  // Number of items per page
            $page = $request->input('page', 1);  // Current page number (default: 1)
            $search = $request->input('search');  // Search value
            $sortColumn = 'id';  // Default sort column
            $sortDirection = $request->input('sort_direction', 'desc');  // Default sort direction (desc)

            // Set the sort column if provided in the request
            if ($request->has("sort_column")) {
                $sortColumn = match ($request->input('sort_column')) {
                    'title' => 'title',
                    'description' => 'description',
                    default => 'id',
                };
            }

            // Calculate the offset for pagination
            $offset = ($page - 1) * $perPage;

            // Query the database for News and Blogs
            $query = News_and_Blogs::query();

            // Count total records without filters for pagination
            $total = $query->count();

            // Apply search filter if a search term is provided
            // if (!empty($search)) {
            //     $query->where(function ($q) use ($search) {
            //         $q->where('title', 'like', "%$search%")
            //             ->orWhere('title_ban', 'like', "%$search%")
            //             ->orWhere('description', 'like', "%$search%")
            //             ->orWhere('description_ban', 'like', "%$search%");
            //     });
            // }

            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('news_and_blog.title', 'like', "%$search%");
                    // ->orWhere('event.title', 'like', "%$search%");  // Include event title in search
                });
            }

            // Get the count of records after applying the search filter
            $filterCount = $query->count();

            // Apply sorting and limit for pagination
            $news_and_blogs = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();

            // Return the paginated data as JSON
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,  // Total number of records (no filtering)
                'recordsFiltered' => $filterCount,  // Total number of records after filtering
                'data' => NewsBlogsResource::collection($news_and_blogs),  // Paginated data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage(),  // Return the error message
            ]);
        }
    }



    public function create()
    {
        $title = 'Create News and Blogs';
        $heading = 'Create News and Blogs';
        return view('admin.newsandblog.create', compact('title', 'heading'));
    }
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            /* ---------- Generate Unique Slug ---------- */

            $slug = Str::slug($request->title);

            $count = News_and_Blogs::where('slug', 'like', $slug . '%')->count();

            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            /* ---------------- THUMBNAIL ---------------- */
            $data['thumbnail_image'] = null;
            if ($request->hasFile('thumbnail_image')) {
                $file = $request->file('thumbnail_image');
                $folder = public_path('/uploads/newsandblog');
                if (!file_exists($folder)) mkdir($folder, 0755, true);

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($folder, $filename);
                $data['thumbnail_image'] = '/uploads/newsandblog/' . $filename;
            }

            /* ---------------- BANNER IMAGE ---------------- */
            $data['banner_image'] = null;
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $folder = public_path('/uploads/newsandblog/banner');
                if (!file_exists($folder)) mkdir($folder, 0755, true);

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($folder, $filename);
                $data['banner_image'] = '/uploads/newsandblog/banner/' . $filename;
            }

            /* ---------------- GALLERY IMAGES ---------------- */
            $galleryPaths = [];
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $file) {
                    $folder = public_path('/uploads/newsandblog/gallery');
                    if (!file_exists($folder)) mkdir($folder, 0755, true);

                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move($folder, $filename);
                    $galleryPaths[] = '/uploads/newsandblog/gallery/' . $filename;
                }
            }

            /* ---------------- CREATE ---------------- */
            $news = News_and_Blogs::create([
                'title'             => $request->title,
                'slug'              => Str::slug($request->title),
                'short_description' => $request->short_description,
                'description'       => $request->description,
                'thumbnail_image'   => $data['thumbnail_image'],
                'banner_image'      => $data['banner_image'],
                'gallery_images'    => json_encode($galleryPaths),
                'published_date'    => $request->published_date,
                'type'              => $request->type,
                'template'          => $request->template,
                'status'            => $request->status,
                'created_by'        => Auth::id(),
            ]);

            /* ---------- Save SEO ---------- */

            // Seo::create([

            //     'page_url'         => '/news-and-blogs/' . $news->slug,
            //     'page_name'        => $news->title,
            //     'meta_title'       => $news->title,
            //     'meta_description' => Str::limit(strip_tags($news->short_description), 160),
            //     'meta_keywords'    => $news->title,

            // ]);

            return back()->with('status', 'News and Blogs created successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }


    public function newsandblog_edit($id)
    {
        $news_and_blog = News_and_Blogs::find($id);
        $new_and_blog = News_and_Blogs::findOrFail($id);

        if (!$news_and_blog) {
            return redirect('/admin/newsandblog')->with('error_message_catch', 'News and Blogs not found!');
        }

        $newsblogData = (new NewsBlogsResource($news_and_blog))->toArray(request());
        $title = 'Edit New and Blogs';
        $heading = 'Edit News and Blogs';

        return view('admin.newsandblog.edit', compact('title', 'heading', 'newsblogData', 'new_and_blog'));
    }

    public function newsandblog_update(Request $request, $id)
    {
        try {
            $news = News_and_Blogs::findOrFail($id);

            /* ---------- Generate Unique Slug ---------- */

            $slug = Str::slug($request->title);

            $count = News_and_Blogs::where('slug', 'like', $slug . '%')
                ->where('id', '!=', $id)
                ->count();

            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            /* ---------------- THUMBNAIL ---------------- */
            if ($request->hasFile('thumbnail_image')) {
                $file = $request->file('thumbnail_image');
                $folder = public_path('/uploads/newsandblog');
                if (!file_exists($folder)) mkdir($folder, 0755, true);

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($folder, $filename);
                $news->thumbnail_image = '/uploads/newsandblog/' . $filename;
            }

            /* ---------------- BANNER ---------------- */
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $folder = public_path('/uploads/newsandblog/banner');
                if (!file_exists($folder)) mkdir($folder, 0755, true);

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($folder, $filename);
                $news->banner_image = '/uploads/newsandblog/banner/' . $filename;
            }

            /* ---------------- GALLERY ---------------- */
            $galleryImages = $request->input('existing_gallery_images', []);
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $file) {
                    $folder = public_path('/uploads/newsandblog/gallery');
                    if (!file_exists($folder)) mkdir($folder, 0755, true);

                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move($folder, $filename);
                    $galleryImages[] = '/uploads/newsandblog/gallery/' . $filename;
                }
            }

            /* ---------------- UPDATE FIELDS ---------------- */
            $news->title             = $request->title;
            $news->slug              = Str::slug($request->title);
            $news->short_description = $request->short_description;
            $news->description       = $request->description;
            $news->published_date    = $request->published_date;
            $news->type              = $request->type;
            $news->template          = $request->template;
            $news->status            = $request->status;
            $news->gallery_images    = json_encode($galleryImages);
            $news->updated_by        = Auth::id();

            $news->save();

            /* ---------- Update SEO ---------- */

            // Seo::updateOrCreate(

            //     [
            //         'page_url' => '/news-and-blogs/' . $slug,
            //     ],

            //     [
            //         'page_name'        => $news->title,
            //         'meta_title'       => $news->title,
            //         'meta_description' => Str::limit(strip_tags($news->short_description), 160),
            //         'meta_keywords'    => $news->title,
            //     ]
            // );

            return back()->with('status', 'News and Blogs updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error_message_catch', $e->getMessage());
        }
    }


    public function delete(Request $request)
    {
        try {
            $news_and_blog = News_and_Blogs::find($request->input('id'));

            if (!$news_and_blog) {
                return response()->json([
                    'success' => false,
                    'message' => "News and Blogs not found",
                ], 404);
            }

            $news_and_blog->deleted_by = Auth::user()->id ?? null;
            $news_and_blog->save();
            $news_and_blog->delete();

            return response()->json([
                'success' => true,
                'message' => "News and Blogs deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function news_and_blogs_display(Request $request)
    {
        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);


        // ✅ Default type = news
        $type = $request->get('type', 'news');


        // Set the current page for pagination
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });


        // ✅ Base query
        $query = News_and_Blogs::where('status', 'Active')
            ->where('type', $type)
            ->orderBy('published_date', 'desc');


        // ✅ Total count PER TYPE
        $total = $query->count();


        // ✅ Paginate
        $news_and_blogs = $query->paginate($paginate_count);


        // ✅ AJAX response
        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.news-and-blogs.item', compact('news_and_blogs'))->render(),
                'count' => $news_and_blogs->count(),
                'total' => $total,
            ]);
        }


        // ✅ First page load (default: news)
        return view('website.news-and-blogs', compact('news_and_blogs', 'total'));
        // $paginate_count = env('PAGINATE_COUNT', 6);
        // $page = $request->get('page', 1);
        // $total = News_and_Blogs::where('status', 'Active')->count();

        // // Set the current page for pagination
        // Paginator::currentPageResolver(function () use ($page) {
        //     return $page;
        // });

        // $news_and_blogs = News_and_Blogs::where('status', 'Active')
        //     ->orderBy('published_date', 'desc')
        //     ->paginate($paginate_count);

        // // For AJAX "load more"
        // if ($request->ajax()) {
        //     return response()->json([
        //         'html' => view('website.news-and-blogs.item', compact('news_and_blogs'))->render(),
        //         'count' => $news_and_blogs->count()
        //     ]);
        // }

        // return view('website.news-and-blogs', compact('news_and_blogs', 'total'));
    }



    // public function newsandblog_display()
    // {
    //    $news_and_blogs = News_and_Blogs::all(); // fetches all news_and_blogs from the 'newsandblog' table
    //     return response()->json($news_and_blogs);
    // }


    // public function show($slug)
    // {
    //     $news_and_blogs = News_and_Blogs::where('slug', $slug)->firstOrFail();
    //     $post = $news_and_blogs;  // just reuse the same object
    //     return view('website.news-and-blogs.detail', compact('news_and_blogs', 'post'));
    // }

    public function show($slug)
    {
        $news_and_blogs = News_and_Blogs::where('slug', $slug)->firstOrFail();

        // This line is essentially doing what the original code did, but now using 'with' for clarity
        return view('website.news-and-blogs.detail', compact('news_and_blogs'))
            ->with('post', $news_and_blogs); // alias news_and_blogs as post for OG tags if your master uses $post
    }


    public function cities()
    {
        return $this->hasMany(NewsCity::class, 'news_id');
    }
}
