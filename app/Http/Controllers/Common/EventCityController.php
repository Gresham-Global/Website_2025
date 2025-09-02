<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventCity;
use App\Models\City;
use App\Models\Event;
use App\Http\Resources\Cities\CityResource;

use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class EventCityController extends Controller
{
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Events Cities';
        $cities = EventCity::all(); // adjust model name if different
        return view('admin.event.cities.index', compact('title', 'heading', 'cities'));
    }


    public function allCities(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 6);
            $page = $request->input('page', 1);
            $search = $request->input('search');
            $sortColumn = 'id';
            $sortDirection = $request->input('sort_direction', 'desc');

            if ($request->has("sort_column")) {
                $sortColumn = match ($request->input('sort_column')) {
                    'title' => 'title',
                    'city_name' => 'city_name',
                    'state' => 'state',
                    'country' => 'country',
                    'type' => 'type',
                    default => 'id',
                };
            }

            $offset = ($page - 1) * $perPage;

            $query = EventCity::query()
                ->join('cities', 'events_cities.city_id', '=', 'cities.id')  // Join cities table
                ->join('event', 'events_cities.event_id', '=', 'event.id')  // Join events table
                ->select('events_cities.id', 'events_cities.event_id', 'cities.city_name', 'cities.state', 'cities.country', 'cities.type', 'event.title as event_name');  // Fetch event name

            // Count total records without filters
            $total = $query->count();

            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('cities.city_name', 'like', "%$search%")
                        ->orWhere('event.title', 'like', "%$search%");  // Include event title in search
                });
            }

            // Get the count of records after filtering
            $filterCount = $query->count();

            // Apply sorting, pagination
            $events_cities = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get()
                ->groupBy('event_name') // Group by event name
                ->map(function ($group) {
                    return [
                        'event_id' => $group[0]->event_id, // Include event ID
                        'event_name' => $group[0]->event_name,
                        'cities' => $group->pluck('city_name')->implode(', '), // Create comma-separated city names
                    ];
                })
                ->values() // Convert to indexed array
                ->toArray(); // Convert to array for JSON response

            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $filterCount,
                'data' => $events_cities,
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
        $cities = City::select('id', 'city_name')->get();
        return view('admin.event.cities.create', compact('title', 'heading', 'events', 'cities'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'event_id' => 'required|exists:event,id',
            'city' => 'required|array',
        ]);

        try {
            $event = Event::findOrFail($validated['event_id']);
    
            $cityIds = [];
    
            foreach ($request->city as $cityName) {
                $formattedName = ucfirst(strtolower(trim($cityName)));
            
                if (!empty($formattedName)) {
                    $city = City::firstOrCreate(
                        ['city_name' => $formattedName],
                        ['created_by' => auth()->id(), 'created_at' => now(), 'updated_at' => now()]
                    );
                    $cityIds[] = $city->id;
                }
            }
    
            // Sync without detaching others if needed, or use sync() if you want to replace
            $event->cities()->sync($cityIds);
    
            return redirect()->back()->with('status', 'City added successfully!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error_message_catch', 'Something went wrong while adding city.');
        }
    }

    public function showCitiesWithImages($eventsId)
    {
        $cities = EventCity::with('images')->where('event_id', $eventsId)->get();
        return CityResource::collection($cities);
    }
    // app/Http/Controllers/Common/EventCityController.php

    public function edit($id)
    {
        try {
            $title = 'Edit City';  // Assign the correct title
            $eventCities = EventCity::where('event_id', $id)->get(); // Get all entries for the event_id
            $events = Event::all();
            $cities = City::where('type', 'city')->get(); // optional: limit to type=city
            return view('admin.event.cities.edit', compact('eventCities', 'events', 'cities','title','id'));
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect('admin/event/cities')->with('error', 'Event city not found.');
        }
    }
 
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:event,id',
            'city' => 'required|array',
        ]);
        // dd($request->all());
        try {
            // Find the event or fail
            $event = Event::findOrFail($validated['event_id']);

            $cityIds = [];

            // Loop through each city name from the input
            foreach ($request->city as $cityName) {
                $formattedName = ucfirst(strtolower(trim($cityName)));

                // Ensure the city name is not empty before attempting to create or fetch
                if (!empty($formattedName)) {
                    $city = City::firstOrCreate(
                        ['city_name' => $formattedName],
                        ['created_by' => auth()->id()] // Only set created_by if the city is new
                    );
                    $cityIds[] = $city->id;
                }
            }

            // Sync the cities for the event (attach new cities and remove any cities no longer selected)
            $event->cities()->sync($cityIds);

            // Return success message
            return redirect()->back()->with('status', 'City Updated successfully!');
        } catch (\Exception $e) {
            // Log the error message for debugging (optional)
            \Log::error('Error updating cities for event: ' . $e->getMessage());

            // Return error message to user
            return redirect()->back()->with('error_message_catch', 'Something went wrong while adding city.');
        }
    }



}