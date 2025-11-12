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
            $data['thumbnail_image'] = null;

            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');

                $requestData = new Request(['folder_name' => 'newsandblog']);
                $requestData->files->set('image', $thumbnail_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $imageController = new ImageController();
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $data['thumbnail_image'] = $responseImageData['data']['imagePath'] ?? null;
                }
            }

            $data['gallery_images'] = [];

            if ($request->hasFile('gallery_images')) {
                $galleryImages = $request->file('gallery_images');
                $paths = [];

                foreach ($galleryImages as $image) {
                    $requestData = new Request(['folder_name' => 'newsandblog/gallery']);
                    $requestData->files->set('image', $image);

                    $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                    $imageController = new ImageController();
                    $response = $imageController->upload_image_storage_only($imageUploadRequest);
                    $responseImageData = json_decode($response->getContent(), true);

                    if (!empty($responseImageData['success'])) {
                        $paths[] = $responseImageData['data']['imagePath'] ?? null;
                    }
                }

                $data['gallery_images'] = json_encode($paths);
            }


            $user = Auth::user();

            if (!$user) {
                return redirect()->back()->withInput()->with('error_message_catch', 'Authentication required!');
            }

            News_and_Blogs::create([
                "title" => $request->get('title'),
                "slug" => Str::slug($request->get('title')),
                "short_description" => $request->get('short_description'),
                "description" => $data['description'] ?? null,
                "thumbnail_image" => $data['thumbnail_image'],
                "published_date" => $request->get('published_date'),
                "share_link" => $request->get('share_link'),
                "created_by" => $user->id,
            ]);

            return redirect()->back()->with('status', 'News and Blogs created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
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
            $news_and_blog = News_and_Blogs::findOrFail($id);
            $data = $request->all();
            $thumbnail_image_path = null;

            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');
                $requestData = new Request(['folder_name' => 'event']);
                $requestData->files->set('image', $thumbnail_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $imageController = new ImageController();
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $thumbnail_image_path = $responseImageData['data']['imagePath'] ?? null;
                }
            }

            $news_and_blog->title = $request->get('title') ?? $news_and_blog->title;
            $news_and_blog->slug = Str::slug($request->get('title'));
            $news_and_blog->short_description = $request->get('short_description') ?? null;
            $news_and_blog->description = $request->get('description') ?? null;
            $news_and_blog->thumbnail_image = $thumbnail_image_path ?? $data["thumbnail_image_url_original"] ?? $news_and_blog->thumbnail_image;
            $news_and_blog->published_date = $request->get('published_date') ?? null;
            $news_and_blog->share_link = $request->get('share_link') ?? null;
            $news_and_blog->updated_by = Auth::user()->id ?? null;

            // Update the status field from the request (use the provided status or leave the current one if not set)
            $news_and_blog->status = $request->get('status', 'Active');

            $news_and_blog->save();

            return redirect('admin/newsandblog/edit/' . $id)->with('status', 'News and Blogs updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message_catch', 'Something went wrong! ' . $e->getMessage());
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
        $total = News_and_Blogs::where('status', 'Active')->count();

        // Set the current page for pagination
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $news_and_blogs = News_and_Blogs::where('status', 'Active')
            ->orderBy('published_date', 'desc')
            ->paginate($paginate_count);

        // For AJAX "load more"
        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.news-and-blogs.item', compact('news_and_blogs'))->render(),
                'count' => $news_and_blogs->count()
            ]);
        }

        return view('website.news-and-blogs', compact('news_and_blogs', 'total'));
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
