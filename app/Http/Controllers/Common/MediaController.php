<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Http\Resources\Media\MediaResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Media';
        return view('admin.media.index', compact('title', 'heading'));
    }

    public function allMedia(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 10); // Number of items per page
            $page = $request->input('page', 1); // Current page
            $search = $request->input('search.value');
            $columnName = "id"; // Default sort column
            if ($request->has("sort_column")) {
                switch ($request->input('sort_column')) {
                    case 'facilityName':
                        $columnName = "facility_name";
                        break;
                    case 'facilityDescription':
                        $columnName = "description";
                        break;
                    default:
                        # code...
                        break;
                }
            }
            $sortColumn = $columnName;
            $sortDirection = $request->input('sort_direction', 'desc');

            // Calculate offset based on page and per_page
            $offset = $request->input('start', 0); //($page - 1) * $perPage;

            //echo $page." -- ".$offset." -- ".$perPage;
            $query = Media::query();
            $total = $query->count();
            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%$search%")
                        ->orWhere('title_ban', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhere('description_ban', 'like', "%$search%");
                });
            }

            // Apply sorting and pagination
            $filterCount = $query->count();
            $medias = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();
            //echo $medias;
            //dd($medias);

            $pagination = [
                'page' => (int) $page,
                'perPage' => $perPage,
                'total' => $total,
                'filterCount' => $filterCount,
            ];

            if ($medias->isNotEmpty()) {
                $result = [
                    'draw' => $request->input('draw'),
                    'recordsTotal' => $pagination['total'], // Total records without filtering
                    'recordsFiltered' => $pagination['filterCount'], // Total records after filtering (if applicable)
                    'data' => MediaResource::collection($medias), // Actual data to be displayed
                ];
            } else {
                $result = [
                    'draw' => $request->input('draw'),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                ];
            }

            return response()->json($result);
        } catch (\Exception $e) {
            $result = [
                'draw' => $request->input('draw'),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage()
            ];
            return response()->json($result);
        }
    }

    public function create()
    {
        $title = 'Create Media';
        $heading = 'Create Media';
        return view('admin.media.create', compact('title', 'heading'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'thumbnail_image.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:500', // 500 KB
                'dimensions:width=640,height=360'
            ],
            'logo_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:500'
            ],
        ], [
            'thumbnail_image.*.max' => 'Each thumbnail image must be below 500KB.',
            'thumbnail_image.*.dimensions' => 'Thumbnail image must be exactly 640x360 pixels.',
        ]);
        try {

            $data = $request->all();
            // dd($data);

            if ($request->hasFile('thumbnail_image')) {

                $thumbnail_images = $request->file('thumbnail_image');
                $imagePaths = [];

                foreach ($thumbnail_images as $thumbnail_image) {

                    $requestData = new Request([
                        'folder_name' => 'media',
                    ]);

                    $requestData->files->set('image', $thumbnail_image);

                    $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                    $imageController = new ImageController();
                    $response = $imageController->upload_image_storage_only($imageUploadRequest);

                    $responseImageData = json_decode($response->getContent(), true);

                    if ($responseImageData['success']) {
                        $imagePaths[] = $responseImageData['data']['imagePath'];
                    }
                }

                // store multiple images as JSON
                $data['thumbnail_image'] = json_encode($imagePaths);
            } else {
                $data['thumbnail_image'] = null;
            }

            // if ($request->hasFile('thumbnail_image')) {
            //     // dd('sssssss');
            //     $thumbnail_image = $request->file('thumbnail_image');

            //     // Create a new Request instance and merge the file and folder name
            //     $requestData = new Request([
            //         'folder_name' => 'media',
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

            if ($request->hasFile('logo_image')) {
                // dd('sssssss');
                $image = $request->file('logo_image');

                // Create a new Request instance and merge the file and folder name
                $requestData = new Request([
                    'folder_name' => 'media',
                ]);

                // Add the file to the request
                $requestData->files->set('image', $image);

                // Create a new instance of the ImageUploadRequest using the Request data
                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                // Create an instance of ImageController
                $imageController = new ImageController();

                // Call the upload_image_s3_only method and get the response
                $response = $imageController->upload_image_storage_only($imageUploadRequest);

                // Decode the response to get the data
                $responseImageData = json_decode($response->getContent(), true);
                // Check if the response is successful and set the logo_image data
                if ($responseImageData['success']) {
                    $data['logo_image'] = $responseImageData['data']['imagePath'];
                }
            } else {
                // dd('sssssssvvvvvvv');
                $data['logo_image'] = null;
            }

            $media = Media::create([
                "title" => $request->get('title'),
                "slug" => Str::slug($request->get('title')), // Generate slug dynamically
                "short_description" => $request->get('short_description'),
                "thumbnail_image" => $data['thumbnail_image'] ?? null,
                "logo_image" => $data['logo_image'] ?? null,
                "media_link" => $request->get('media_link'),
                "publish_date" => $request->get('publish_date') ?? null,
                "status" => $request->get('status') ?? 0,
                "created_by" => auth()->id(),
            ]);

            return redirect()->back()->with('status', 'Media created successfully!');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }

    public function media_edit($id)
    {
        $media = Media::find($id);
        if ($media == null) {
            return redirect('/admin/media')->with('error_message_catch', 'Institute not found!');
            // dd("error");
        }

        $mediaData = (new MediaResource($media))->toArray(request());
        $title = 'Edit Blog';
        $heading = 'Edit Blog';
        return view('admin.media.edit', compact('title', 'heading', 'mediaData'));
    }


    public function media_update(Request $request, $id)
    {

        $data = $request->all();
        // ✅ VALIDATION
        $request->validate([
            'thumbnail_image.*' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:500',
                'dimensions:width=640,height=360'
            ],
            'logo_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:500'
            ],
        ], [
            'thumbnail_image.*.dimensions' => 'Thumbnail image must be exactly 640x360 pixels.',
        ]);
        try {
            $media = Media::findOrFail($id);

            if ($media != null) {

                $thumbnail_image_path = "";
                $logo_image_path = "";
                if ($request->hasFile('thumbnail_image')) {

                    $thumbnail_images = $request->file('thumbnail_image');
                    $imagePaths = [];

                    foreach ($thumbnail_images as $thumbnail_image) {

                        $requestData = new Request([
                            'folder_name' => 'media',
                        ]);

                        $requestData->files->set('image', $thumbnail_image);

                        $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                        $imageController = new ImageController();
                        $response = $imageController->upload_image_storage_only($imageUploadRequest);

                        $responseImageData = json_decode($response->getContent(), true);

                        if (!empty($responseImageData['success']) && $responseImageData['success']) {
                            $imagePaths[] = $responseImageData['data']['imagePath'];
                        }
                    }

                    // replace with new JSON
                    $media->thumbnail_image = json_encode($imagePaths);
                } else {
                    // keep existing images
                    $media->thumbnail_image = $data['thumbnail_image_url_original'];
                }
                if ($request->hasFile('logo_image')) {
                    $image = $request->file('logo_image');

                    // Create a new Request instance and merge the file and folder name
                    $requestData = new Request([
                        'folder_name' => 'media',
                    ]);

                    // Add the file to the request
                    $requestData->files->set('image', $image);

                    // Create a new instance of the ImageUploadRequest using the Request data
                    $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                    // Create an instance of ImageController
                    $imageController = new ImageController();

                    // Call the upload_image_s3_only method and get the response
                    $response = $imageController->upload_image_storage_only($imageUploadRequest);

                    // Decode the response to get the data
                    $responseImageData = json_decode($response->getContent(), true);
                    // dump($responseImageData);
                    ($responseImageData);
                    // Check if the response is successful and set the cover_image data
                    if ($responseImageData['success']) {
                        $logo_image_path = $responseImageData['data']['imagePath'];
                    }
                }
                $media->title = $request->get('title') ?? $media->title;
                $media->slug = Str::slug($request->get('title'));
                $media->short_description = $request->get('short_description') ?? $media->short_description;
                $media->thumbnail_image = $thumbnail_image_path == "" ? $data["thumbnail_image_url_original"] : $thumbnail_image_path;
                $media->logo_image = $logo_image_path == "" ? $data["logo_image_url_original"] : $logo_image_path;
                $media->media_link = $request->get('media_link') ?? $media->media_link;
                $media->publish_date = $request->get('publish_date') ?? $media->publish_date;
                $media->status = $request->get('status') ?? $media->status;
                $media->updated_by = auth()->id();
                $media->save();
                return redirect('admin/media/edit/' . $id)->with('status', 'Media updated successfully!');
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
            $media = Media::find($id);

            if (!$media) {
                return response()->json([
                    'success' => false,
                    'message' => "Media not found",
                    'data' => null
                ], 404);
            }

            // Update deleted_by before deleting
            $media->deleted_by = auth()->id(); // Assuming authentication is used
            $media->save();

            // Now delete the record
            $media->delete();

            return response()->json([
                'success' => true,
                'message' => "Media deleted successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }



    public function media_display(Request $request)
    {
        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);
        $total = Media::where("status", 1)->count();

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $media = Media::where("status", 1)->orderBy('publish_date', 'desc')->paginate($paginate_count);

        if ($request->ajax()) {
            $html = view('website.media.media_item', compact('media'))->render();

            return response()->json([
                'html' => $html,
                'count' => $media->count()
            ]);
        }

        return view('website.media.media', compact('media', 'total'));
    }
}
