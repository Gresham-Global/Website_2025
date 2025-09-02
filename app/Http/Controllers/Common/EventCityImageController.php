<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventCity;
use App\Models\City;
use App\Models\Event;
use App\Models\EventCityImage;
use App\Http\Resources\Cities\CityResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EventCityImageController extends Controller
{
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Events Cities';
        $cities = EventCity::all(); // adjust model name if different
        return view('admin.event.city_images.index', compact('title', 'heading', 'cities'));
    }


    public function allEventCityImages(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 6);
            $page = $request->input('page', 1);
            $search = $request->input('search');
            $sortDirection = $request->input('sort_direction', 'desc');

            // Default sort column
            $sortColumn = 'min_id';

            if ($request->has('sort_column')) {
                $sortColumn = match ($request->input('sort_column')) {
                    'event_name' => 'event_name',
                    'city_name' => 'city_name',
                    default => 'min_id',
                };
            }

            $offset = ($page - 1) * $perPage;

            // Build query
            $baseQuery = DB::table('event_city_images as eci')
                ->join('cities as c', 'eci.city_id', '=', 'c.id')
                ->join('event as e', 'eci.event_id', '=', 'e.id')
                ->select(
                    'eci.event_id',
                    'e.title as event_name',
                    'eci.city_id',
                    'c.city_name',
                    DB::raw('MIN(eci.id) as min_id')
                )
                ->groupBy('eci.event_id', 'e.title', 'eci.city_id', 'c.city_name');

            // Apply search filter
            if (!empty($search)) {
                $baseQuery->where(function ($query) use ($search) {
                    $query->where('e.title', 'like', "%$search%")
                          ->orWhere('c.city_name', 'like', "%$search%");
                });
            }

            // $filtered = $baseQuery->get();

            // $total = $filtered->count();


            // $records = $filtered
            //     ->sortBy(function ($item) use ($sortColumn) {
            //         return $item->$sortColumn;
            //     }, SORT_REGULAR, $sortDirection === 'desc')
            //     ->slice($offset, $perPage)
            //     ->values();

            $filtered = $baseQuery->get() ?? collect(); // Ensure it's at least an empty collection

            $total = $filtered->count();

            $records = $filtered
                ->sortBy(function ($item) use ($sortColumn) {
                    return $item->$sortColumn;
                }, SORT_REGULAR, $sortDirection === 'desc')
                ->slice($offset, $perPage)
                ->values();


            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $records,
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



    public function create()
    {
        $title = 'Create New City';  // Assign the correct title
        $heading = 'Add a New City to Events';
        $events = Event::select('id', 'title')->get();
        // $cities = City::select('id', 'city_name')->get();
        return view('admin.event.city_images.create', compact('title', 'heading', 'events'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'event_id' => 'required|exists:event,id',
                'city_id' => 'required|exists:cities,id',
                'city_images' => 'required|array|min:1',
                'city_images.*' => 'image|mimes:jpeg,jpg,png,webp|max:1024',
            ]);

            $imagePaths = [];

            foreach ($request->file('city_images') as $image) {
                $requestData = new Request(['folder_name' => 'event']);
                $requestData->files->set('image', $image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $imageController = new ImageController();
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $imagePaths[] = $responseImageData['data']['imagePath'] ?? null;
                }
            }
            $city  = City::find($request->city_id);
            $event = Event::find($request->event_id);
            foreach ($imagePaths as $imagePath) {
                EventCityImage::create([
                    'event_id' => $request->event_id,
                    'city_id' => $request->city_id,
                    'image_path' => $imagePath,
                    'caption'    => 'Image of ' . $city->city_name . ' for ' . $event->title,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id(),
                ]);
            }

            return redirect()->back()->with('status', 'Images uploaded and stored successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Image upload/store failed: ' . $e->getMessage());

            return redirect()->back()->with('error_message_catch', 'Something went wrong while uploading images.');
        }
    }


    public function showCitiesWithImages($eventsId)
    {
        $cities = EventCity::with('images')->where('event_id', $eventsId)->get();
        return CityResource::collection($cities);
    }
    // app/Http/Controllers/Common/EventCityController.php

    public function edit($event_id, $city_id)
    {
        try {
            $title = 'Edit Event City Images';
            $eventCityImage = EventCityImage::where('event_id', $event_id)->where('city_id', $city_id)->get(); // Get all entries for the event_id
            $city  = City::find($city_id);
            $event = Event::find($event_id);
            return view('admin.event.city_images.edit', compact('eventCityImage', 'event', 'city', 'title'));
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect('admin/event/city/images')->with('error', 'Event data not found.');
        }
    }

    public function update(Request $request, $id)
    {
        // Convert comma-separated string to array if necessary
        if ($request->has('delete_image_ids') && is_string($request->delete_image_ids)) {
            $request->merge([
                'delete_image_ids' => explode(',', $request->delete_image_ids)
            ]);
        }

        try {
            // Validate incoming request data
            $request->validate([
                'event_id' => 'required|exists:event,id',
                'city_id' => 'required|exists:cities,id',
                'city_images' => 'nullable|array',
                'city_images.*' => 'image|mimes:jpeg,jpg,png,webp|max:1024',
                'delete_image_ids' => 'nullable|array',
                'delete_image_ids.*' => 'exists:event_city_images,id',
                'existing_image_paths' => 'nullable|array',
            ]);

            $event = Event::findOrFail($request->event_id);
            $city = City::findOrFail($request->city_id);

            // Handle deletions
            if (!empty($request->delete_image_ids)) {
                foreach ($request->delete_image_ids as $imageId) {
                    $image = EventCityImage::find($imageId);
                    if ($image) {
                        if (Storage::exists($image->image_path)) {
                            Storage::delete($image->image_path);
                        }
                        $image->delete();
                    }
                }
            }

            // Prepare image uploads (key = ID or new)
            $uploadedPaths = [];

            if ($request->hasFile('city_images')) {
                foreach ($request->file('city_images') as $key => $image) {
                    $requestData = new Request(['folder_name' => 'event']);
                    $requestData->files->set('image', $image);

                    $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                    $imageController = new ImageController();
                    $response = $imageController->upload_image_storage_only($imageUploadRequest);
                    $responseImageData = json_decode($response->getContent(), true);

                    if (!empty($responseImageData['success'])) {
                        $uploadedPaths[$key] = $responseImageData['data']['imagePath'] ?? null;
                    }
                }
            }

            // Save or update images
            foreach ($uploadedPaths as $key => $imagePath) {
                if (!$imagePath) continue;

                // Update if key exists in existing_image_paths
                if (isset($request->existing_image_paths[$key])) {
                    $imageModel = EventCityImage::find($key);
                    if ($imageModel) {
                        if (Storage::exists($imageModel->image_path)) {
                            Storage::delete($imageModel->image_path);
                        }

                        $imageModel->update([
                            'image_path' => $imagePath,
                            'updated_by' => Auth::id(),
                        ]);
                    }
                } else {
                    // New image
                    EventCityImage::create([
                        'event_id' => $request->event_id,
                        'city_id' => $request->city_id,
                        'image_path' => $imagePath,
                        'caption' => 'Image of ' . $city->city_name . ' for ' . $event->title,
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ]);
                }
            }

            return redirect()->back()->with('status', 'City images updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Image update failed: ' . $e->getMessage());
            return redirect()->back()->with('error_message_catch', 'Something went wrong while updating the images.');
        }
    }



    public function getCitiesByEvent($eventId)
    {
        try {
            $event = Event::with('cities:id,city_name')->findOrFail($eventId);

            $cities = $event->cities->map(function ($city) {
                return [
                    'id' => $city->id,
                    'name' => $city->city_name,
                ];
            });

            return response()->json([
                'success' => true,
                'cities' => $cities
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch cities.',
                'error' => $e->getMessage()
            ]);
        }
    }
}
