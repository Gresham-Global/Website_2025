<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Life;
use App\Http\Resources\Life\LifeResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class LifeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Life at Grisham Global';
        return view('admin.life.index', compact('title', 'heading'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allLife(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 10);
            $page = $request->input('page', 1);
            $search = $request->input('search.value');

            // Default sort column
            $columnName = "id";

            if ($request->has("sort_column")) {
                switch ($request->input('sort_column')) {
                    case 'facilityName':
                        $columnName = "title"; // assuming title field
                        break;
                    case 'facilityDescription':
                        $columnName = "description";
                        break;
                    case 'order':
                        $columnName = "order"; // <-- add support for order column
                        break;
                    default:
                        $columnName = "id";
                        break;
                }
            }

            $sortColumn = $columnName;
            $sortDirection = $request->input('sort_direction', 'asc'); // order usually ascending

            $offset = $request->input('start', 0);

            $query = Life::query();
            $total = $query->count();

            // Search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%$search%")
                        ->orWhere('title_ban', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhere('description_ban', 'like', "%$search%");
                });
            }

            $filterCount = $query->count();

            // Apply sorting and pagination
            $lifes = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();

            $result = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $filterCount,
                'data' => LifeResource::collection($lifes),
            ];

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage()
            ]);
        }
    }
    public function create()
    {
        $title = 'Create Life at Grisham Global';
        $heading = 'Create Life at Grisham Global';
        return view('admin.life.create', compact('title', 'heading'));
    }

    public function store(Request $request)
    {

        try {

            $data = $request->all();
            // dd($data);


            // if ($request->hasFile('thumbnail_image')) {
            //     // dd('sssssss');
            //     $thumbnail_image = $request->file('thumbnail_image');

            //     // Create a new Request instance and merge the file and folder name
            //     $requestData = new Request([
            //         'folder_name' => 'life',
            //     ]);

            //     // Add the file to the request
            //     $requestData->files->set('image', $thumbnail_image);

            //     // Create a new instance of the ImageUploadRequest using the Request data
            //     $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

            //     // Create an instance of ImageController
            //     $imageController = new ImageController();

            //     // Call the upload_image_s3_only method and get the response
            //     $response = $imageController->upload_image_storage_only($imageUploadRequest);

            //     // Decode the response to get the data
            //     $responseImageData = json_decode($response->getContent(), true);
            //     // dd($responseImageData);
            //     // Check if the response is successful and set the cover_image data
            //     if ($responseImageData['success']) {
            //         $data['thumbnail_image'] = $responseImageData['data']['imagePath'];
            //     }
            // } else {
            //     // dd('sssssssvvvvvvv');
            //     $data['thumbnail_image'] = null;
            // }

            if ($request->hasFile('thumbnail_image')) {

                $thumbnail = $request->file('thumbnail_image');

                // Define the upload path
                $uploadPath = public_path('/uploads/life');

                // Create folder if not exists
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();

                // Move file to public/uploads/life
                $thumbnail->move($uploadPath, $filename);

                // Save path for DB (relative path)
                $data['thumbnail_image'] = '/uploads/life/' . $filename;
            } else {

                $data['thumbnail_image'] = null;
            }


            $life = Life::create([
                "title" => $request->get('title'),
                "slug" => Str::slug($request->get('title')), // Generate slug dynamically
                "thumbnail_image" => $data['thumbnail_image'] ?? null,
                "status" => $request->get('status') ?? 0,
                "order" => $request->get('order', 0),
                "created_by" => auth()->id(),
            ]);

            return redirect()->back()->with('status', 'Life created successfully!');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }

    public function life_edit($id)
    {

        $life = Life::find($id);
        if ($life == null) {
            return redirect('/admin/life')->with('error_message_catch', 'Institute not found!');
            // dd("error");
        }

        $lifeData = (new LifeResource($life))->toArray(request());
        // $lifeData = new LifeResource($life);

        $title = 'Edit Life at Grisham Global';
        $heading = 'Edit Life at Grisham Global';
        return view('admin.life.edit', compact('title', 'heading', 'lifeData'));
    }


    public function life_update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $life = Life::findOrFail($id);

            if ($life != null) {

                $thumbnail_image_path = "";
                // if ($request->hasFile('thumbnail_image')) {
                //     $image = $request->file('thumbnail_image');

                //     // Create a new Request instance and merge the file and folder name
                //     $requestData = new Request([
                //         'folder_name' => 'life',
                //     ]);

                //     // Add the file to the request
                //     $requestData->files->set('image', $image);

                //     // Create a new instance of the ImageUploadRequest using the Request data
                //     $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                //     // Create an instance of ImageController
                //     $imageController = new ImageController();

                //     // Call the upload_image_s3_only method and get the response
                //     $response = $imageController->upload_image_storage_only($imageUploadRequest);

                //     // Decode the response to get the data
                //     $responseImageData = json_decode($response->getContent(), true);
                //     // dump($responseImageData);
                //     // Check if the response is successful and set the cover_image data
                //     if ($responseImageData['success']) {
                //         $thumbnail_image_path = $responseImageData['data']['imagePath'];
                //     }
                // }
                if ($request->hasFile('thumbnail_image')) {

                    $image = $request->file('thumbnail_image');

                    // Path: public/uploads/life
                    $uploadPath = public_path('/uploads/life');

                    // Create folder if not exists
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }

                    // New unique filename
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                    // Move file
                    $image->move($uploadPath, $filename);

                    // Save relative path for database
                    $thumbnail_image_path = '/uploads/life/' . $filename;
                } else {

                    // No new upload → keep old image
                    $thumbnail_image_path = $request->thumbnail_image_url_original ?? null;
                }
                $life->title = $request->get('title') ?? $life->title;
                $life->slug = Str::slug($request->get('title'));
                $life->thumbnail_image = $thumbnail_image_path == "" ? $data["thumbnail_image_url_original"] : $thumbnail_image_path;
                $life->status = $request->get('status') ?? $life->status;
                $life->order = $request->get('order') ?? $life->order;
                $life->updated_by = auth()->id();
                $life->save();
                return redirect('admin/life/edit/' . $id)->with('status', 'Life updated successfully!');
            } else {
                return redirect()->back()->with('error_message_catch', 'Something went wrong!');
            }
        } catch (\Exception $e) {
            // dd($e->getMessage()." catch");

            return redirect()->back()->with('error_message_catch', 'Something went wrong! ');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        try {
            $life = Life::find($id);

            if (!$life) {
                return response()->json([
                    'success' => false,
                    'message' => "Life not found",
                    'data' => null
                ], 404);
            }

            // Update deleted_by before deleting
            $life->deleted_by = auth()->id(); // Assuming authentication is used
            $life->save();

            // Now delete the record
            $life->delete();

            return response()->json([
                'success' => true,
                'message' => "Life deleted successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    public function life_display(Request $request)
    {
        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);
        $total = Life::where("status", 1)->count();

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $life = Life::where("status", 1)->paginate($paginate_count);

        if ($request->ajax()) {
            $html = view('website.life.life_item', compact('life'))->render();

            return response()->json([
                'html' => $html,
                'count' => $life->count()
            ]);
        }

        return view('website.life.life', compact('life', 'total'));
    }
}
