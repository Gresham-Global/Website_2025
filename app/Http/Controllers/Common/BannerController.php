<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Resources\Banner\BannerResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;




class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Banner';
        return view('admin.banner.index', compact('title', 'heading'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Banner';
        $heading = 'Create Banner';
        return view('admin.banner.create', compact('title', 'heading'));
    }

    public function allBanner(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 10);
            $search = $request->input('search.value');
            $offset = $request->input('start', 0);
            $sortColumnRequest = $request->input('sort_column');
            $sortDirection = $request->input('sort_direction', 'asc');

            // Default column
            $columnName = "id";

            // Sorting conditions
            if ($sortColumnRequest) {
                switch ($sortColumnRequest) {
                    case 'title':
                        $columnName = "title";
                        break;

                    case 'banner_type':
                        $columnName = "banner_type";
                        break;

                    case 'order':
                        $columnName = "order";
                        break;

                    case 'status':
                        $columnName = "status";
                        break;

                    default:
                        $columnName = "id";
                        break;
                }
            }

            $query = Banner::query();

            $total = $query->count();

            // SEARCH
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%$search%")
                        ->orWhere('banner_type', 'like', "%$search%");
                });
            }

            $filterCount = $query->count();

            // Pagination + Sorting
            $banners = $query->orderBy($columnName, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();

            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $filterCount,
                'data' => BannerResource::collection($banners),
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // Validate
            $request->validate([
                'title' => 'required|string|max:255',
                'banner_type' => 'required|string',
                'status' => 'nullable|numeric',
                'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'mobile_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            ]);

            $data = $request->all();

            // Desktop Image Upload
            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $uploadPath = public_path('/uploads/banners');

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move($uploadPath, $filename);

                $data['image'] = '/uploads/banners/' . $filename;
            } else {
                $data['image'] = null;
            }

            // ----------- MOBILE IMAGE UPLOAD -----------
            if ($request->hasFile('mobile_image')) {

                $mobileImage = $request->file('mobile_image');

                $uploadPath = public_path('/uploads/banners');

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $mobileFilename = time() . '_mobile_' . uniqid() . '.' . $mobileImage->getClientOriginalExtension();

                $mobileImage->move($uploadPath, $mobileFilename);

                $data['mobile_image'] = '/uploads/banners/' . $mobileFilename;
            } else {
                $data['mobile_image'] = null;
            }
            // ---------------------------------------------------

            // Create Banner
            Banner::create([
                "title"         => $request->get('title'),
                "slug"          => Str::slug($request->get('title')),
                "image"         => $data['image'],
                "mobile_image"  => $data['mobile_image'],
                "banner_type"   => $request->get('banner_type'),
                "redirect_url"  => $request->get('redirect_url'),
                "status"        => $request->get('status') ?? 0,
                "order"         => $request->get('order', 0),
                "created_by"    => auth()->id(),
            ]);

            return redirect()->back()->with('status', 'Banner created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }


    public function banner_edit($id)
    {
        $banner = Banner::find($id);

        if ($banner == null) {
            return redirect('/admin/banner')->with('error_message_catch', 'Banner not found!');
        }

        // Convert model to resource array
        $bannerData = (new BannerResource($banner))->toArray(request());

        $title = 'Edit Banner';
        $heading = 'Edit Banner';

        return view('admin.banner.edit', compact('title', 'heading', 'bannerData'));
    }

    public function banner_update(Request $request, $id)
    {
        try {
            // Validate fields
            $request->validate([
                'title'        => 'required|string|max:255',
                'banner_type'  => 'required|string',
                'status'       => 'nullable|numeric',
                'order'        => 'nullable|integer|min:0',
                'image'        => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'mobile_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            ]);

            $banner = Banner::findOrFail($id);

            // Upload path
            $uploadPath = public_path('/uploads/banners');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadPath, $filename);
                $image_path = '/uploads/banners/' . $filename;
            } else {
                // Use hidden field from your form
                $image_path = $request->input('image_original');
            }


            if ($request->hasFile('mobile_image')) {
                $mImage = $request->file('mobile_image');
                $filename_m = time() . '_' . uniqid() . '_m.' . $mImage->getClientOriginalExtension();
                $mImage->move($uploadPath, $filename_m);
                $mobile_image_path = '/uploads/banners/' . $filename_m;
            } else {
                $mobile_image_path = $request->input('mobile_image_original');
            }


            $banner->title        = $request->get('title');
            $banner->slug         = Str::slug($request->get('title'));
            $banner->banner_type  = $request->get('banner_type');
            $banner->status       = $request->get('status');
            $banner->order        = $request->get('order');
            $banner->image        = $image_path;
            $banner->mobile_image = $mobile_image_path;
            $banner->updated_by   = auth()->id();

            $banner->save();

            return redirect('admin/banner/edit/' . $id)->with('status', 'Banner updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }



    public function delete(Request $request)
    {
        $id = $request->input('id');

        try {
            $banner = Banner::find($id);

            if (!$banner) {
                return response()->json([
                    'success' => false,
                    'message' => "Banner not found",
                    'data' => null
                ], 404);
            }

            // Update deleted_by before deleting
            $banner->deleted_by = auth()->id(); // Assuming authentication is used
            $banner->save();

            // Delete the record
            $banner->delete();

            return response()->json([
                'success' => true,
                'message' => "Banner deleted successfully",
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    public function banner_display(Request $request)
    {
        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);

        $total = Banner::where("status", 1)->count();

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $banners = Banner::where("status", 1)->paginate($paginate_count);

        // AJAX request → return only rendered items
        if ($request->ajax()) {
            $html = view('website.banner.banner_item', compact('banners'))->render();

            return response()->json([
                'html' => $html,
                'count' => $banners->count()
            ]);
        }

        // Page load → return full page
        return view('website.banner.banner', compact('banners', 'total'));
    }
}
