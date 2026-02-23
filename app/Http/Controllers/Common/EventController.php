<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCityImage;
use App\Http\Resources\Event\EventResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class EventController extends Controller
{
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Events';
        return view('admin.event.index', compact('title', 'heading'));
    }



    public function allEvent(Request $request)
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
            $query = Event::query();

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
                    $q->where('event.title', 'like', "%$search%");
                    // ->orWhere('event.title', 'like', "%$search%");  // Include event title in search
                });
            }

            // Get the count of records after applying the search filter
            $filterCount = $query->count();

            // Apply sorting and limit for pagination
            $events = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();

            // Return the paginated data as JSON
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,  // Total number of records (no filtering)
                'recordsFiltered' => $filterCount,  // Total number of records after filtering
                'data' => EventResource::collection($events),
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
        $title = 'Create Events';
        $heading = 'Create Events';
        return view('admin.event.create', compact('title', 'heading'));
    }

    public function store(Request $request)
    {
        try {

            $data = $request->all();

            // Default null values
            $data['thumbnail_image'] = null;
            $data['banner_image'] = null;

            /* ---------------- THUMBNAIL ---------------- */
            if ($request->hasFile('thumbnail_image')) {

                $file = $request->file('thumbnail_image');

                $folder = public_path('/uploads/event');
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move($folder, $filename);

                // ✅ Save path in $data
                $data['thumbnail_image'] = '/uploads/event/' . $filename;
            }


            /* ---------------- BANNER ---------------- */
            if ($request->hasFile('banner_image')) {

                $file = $request->file('banner_image');

                $folder = public_path('/uploads/event/banner');
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move($folder, $filename);

                // ✅ Save path in $data
                $data['banner_image'] = '/uploads/event/banner/' . $filename;
            }


            /* ---------------- AUTH CHECK ---------------- */
            $user = Auth::user();

            if (!$user) {
                return redirect()->back()
                    ->withInput()
                    ->with('error_message_catch', 'Authentication required!');
            }


            /* ---------------- CREATE EVENT ---------------- */
            Event::create([
                "title" => $request->get('title'),
                "slug" => Str::slug($request->get('title')),
                "short_description" => $request->get('short_description'),
                "description" => $request->get('description') ?? null,

                // ✅ Correct image paths
                "thumbnail_image" => $data['thumbnail_image'],
                "banner_image" => $data['banner_image'],

                "published_date" => $request->get('published_date'),
                "video_link" => $request->get('video_link'),
                "status" => $request->get('status'),
                "created_by" => $user->id,
            ]);


            return redirect()->back()->with('status', 'Event created successfully!');
        } catch (\Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with('error_message_catch', $e->getMessage());
        }
    }

    public function event_edit($id)
    {
        $event = Event::find($id);
        $event_status = Event::findOrFail($id);

        if (!$event) {
            return redirect('/admin/event')->with('error_message_catch', 'Event not found!');
        }

        $eventData = (new EventResource($event))->toArray(request());
        $title = 'Edit Events';
        $heading = 'Edit Events';

        return view('admin.event.edit', compact('title', 'heading', 'eventData', 'event_status'));
    }

    public function event_update(Request $request, $id)
    {
        try {

            $event = Event::findOrFail($id);

            /* ---------------- DEFAULT VALUES ---------------- */
            $thumbnailPath = $event->thumbnail_image;
            $bannerPath    = $event->banner_image;


            /* ---------------- THUMBNAIL ---------------- */
            if ($request->hasFile('thumbnail_image')) {

                $file = $request->file('thumbnail_image');

                $folder = public_path('/uploads/event');
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move($folder, $filename);

                // ✅ New path
                $thumbnailPath = '/uploads/event/' . $filename;
            }


            /* ---------------- BANNER (OPTIONAL) ---------------- */
            if ($request->hasFile('banner_image')) {

                $file = $request->file('banner_image');

                $folder = public_path('/uploads/event/banner');
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move($folder, $filename);

                // ✅ New path
                $bannerPath = '/uploads/event/banner/' . $filename;
            }


            /* ---------------- UPDATE DATA ---------------- */

            $event->title = $request->get('title', $event->title);

            // Only change slug if title exists
            if ($request->filled('title')) {
                $event->slug = Str::slug($request->get('title'));
            }

            $event->short_description = $request->get('short_description', $event->short_description);

            $event->description = $request->get('description', $event->description);

            $event->thumbnail_image = $thumbnailPath;
            $event->published_date = $request->get('published_date', $event->published_date);

            $event->banner_image = $bannerPath;

            $event->video_link = $request->get('video_link', $event->video_link);

            $event->status = $request->get('status', $event->status);

            $event->updated_by = Auth::id();


            /* ---------------- SAVE ---------------- */
            $event->save();


            return redirect('admin/event/edit/' . $id)
                ->with('status', 'Event updated successfully!');
        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error_message_catch', 'Something went wrong! ' . $e->getMessage());
        }
    }


    public function delete(Request $request)
    {
        try {
            $event = Event::find($request->input('id'));

            if (!$event) {
                return response()->json([
                    'success' => false,
                    'message' => "Event not found",
                ], 404);
            }

            $event->deleted_by = Auth::user()->id ?? null;
            $event->save();
            $event->delete();

            return response()->json([
                'success' => true,
                'message' => "Event deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // public function events_display()
    // {
    //     $total = Event::where('status', '1')->count();
    //     $events = Event::orderBy('created_at', 'desc') // Use created_at to sort latest events first
    //         ->paginate(6); // Show 6 events per page

    //     return view('website.events.events', compact('events'));
    // }

    public function events_display(Request $request)
    {
        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $events = Event::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->paginate($paginate_count);

        $total = Event::where('status', '1')->count();

        if ($request->ajax()) {
            $html = view('website.events.events_item', compact('events'))->render();

            return response()->json([
                'html' => $html,
                'count' => $events->count(),
            ]);
        }

        return view('website.events.events', compact('events', 'total'));
    }





    // public function events_display()
    // {
    //     $events = Event::all(); // fetches all events from the 'events' table
    //     return response()->json($events);
    // }

    public function show($slug)
    {
        // Fetch the event based on the slug
        $event = Event::where('slug', $slug)->firstOrFail();

        // Fetch the distinct city_ids for the event
        $cityCount = EventCityImage::where('event_id', $event->id)
            ->distinct('city_id')
            ->count('city_id');

        // If there are more than 1 distinct city_ids for the event, fetch both city-specific and global images
        $cityImages = null;
        $eventWideImages = null;

        if ($cityCount > 1) {
            // Fetch city-specific images for each city (if more than one city is associated with the event)
            $cityImages = EventCityImage::where('event_id', $event->id)
                ->whereNotNull('city_id')  // Filter for city-specific images
                ->get();

            // Fetch global images (event-wide images where city_id is NULL)
            $eventWideImages = EventCityImage::where('event_id', $event->id)
                ->whereNull('city_id')  // Filter for global images
                ->get();
        } else {
            // If only one city is associated with the event, fetch images for that city only
            $cityImages = EventCityImage::where('event_id', $event->id)
                ->whereNotNull('city_id')  // Filter for city-specific images
                ->get();

            // Do not fetch event-wide images when there's only one city
            $eventWideImages = collect(); // Empty collection
        }
        // dd($cityImages);
        // Pass the event and images data to the view
        // return view('website.events.detail', compact('event', 'cityImages', 'eventWideImages'));

        return view('website.events.detail', compact('event', 'cityImages', 'eventWideImages'))
            ->with('post', $event); // alias event as post for OG tags if your master uses $post

    }
}
