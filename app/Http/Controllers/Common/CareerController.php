<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\JobInterest;
use App\Http\Resources\Career\CareerResource;
use App\Http\Resources\Job\JobResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class CareerController extends Controller
{
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Career';
        return view('admin.career.index', compact('title', 'heading'));
    }


    // public function all_career_frontend(){
    //     $title = 'Phoenix Mecano';
    //     //dd(session()->all());
    //     $careers = Career::where('status', 'active')->orderBy('created_at', 'desc')
    //                 ->paginate(9)->map(function ($item) {
    //                     $item->created_at_human = $item->created_at->diffForHumans();
    //                     return $item;
    //                 });

    //         //dd($blogs);
    //     return view('website.careers',compact('careers'));
    // }

    public function all_career_frontend()
    {
        $title = 'Phoenix Mecano';
        // Fetch only 3 active careers, ordered by created_at
        $careers = Career::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(3) // Limit to 3 records
            ->get()
            ->map(function ($item) {
                $item->created_at_human = $item->created_at->diffForHumans();
                return $item;
            });

        return view('website.careers', compact('careers'));
    }


    public function career_details_frontend($careerid = null)
    {
        $title = 'Phoenix Mecano';
        //dd(session()->all());
        $career =  Career::where('slug', $careerid)->first();

        if ($career == null) {
            return redirect('/careers');
        }



        //dd($blogs);
        return view('website.career-details', compact('career'));
    }

    public function allCareer(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 10); // Number of items per page
            $page = $request->input('page', 1); // Current page
            $search = $request->input('search.value');
            $columnName = "id"; // Default sort column
            if ($request->has("sort_column")) {
                switch ($request->input('sort_column')) {
                    case 'title':
                        $columnName = "title";
                        break;
                    case 'description':
                        $columnName = "short_description";
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
            $query = Career::query();
            $total = $query->count();
            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%$search%")
                        ->orWhere('short_description', 'like', "%$search%");
                });
            }

            // Apply sorting and pagination
            $filterCount = $query->count();
            $careers = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();
            //echo $careers;
            //dd($careers);

            $pagination = [
                'page' => (int)$page,
                'perPage' => $perPage,
                'total' => $total,
                'filterCount' => $filterCount,
            ];

            if ($careers->isNotEmpty()) {
                $result = [
                    'draw' => $request->input('draw'),
                    'recordsTotal' => $pagination['total'], // Total records without filtering
                    'recordsFiltered' => $pagination['filterCount'], // Total records after filtering (if applicable)
                    'data' => CareerResource::collection($careers), // Actual data to be displayed
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
        $title = 'Create Career';
        $heading = 'Create Career';
        return view('admin.career.create', compact('title', 'heading'));
    }

    public function store(Request $request)
    {

        try {

            $data = $request->all();
            // dd($data);

            if ($request->hasFile('cover_image')) {
                // dd('sssssss');
                $cover_image = $request->file('cover_image');

                // Create a new Request instance and merge the file and folder name
                $requestData = new Request([
                    'folder_name' => 'career',
                ]);

                // Add the file to the request
                $requestData->files->set('image', $cover_image);

                // Create a new instance of the ImageUploadRequest using the Request data
                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                // Create an instance of ImageController
                $imageController = new ImageController();

                // Call the upload_image_s3_only method and get the response
                $response = $imageController->upload_image_storage_only($imageUploadRequest);

                // Decode the response to get the data
                $responseImageData = json_decode($response->getContent(), true);
                // dd($responseImageData);
                // Check if the response is successful and set the cover_image data
                if ($responseImageData['success']) {
                    $data['cover_image'] = $responseImageData['data']['imagePath'];
                }
            } else {
                // dd('sssssssvvvvvvv');
                $data['cover_image'] = null;
            }

            $career = Career::create([
                "title" => $request->get('title'),
                // "slug" => Str::slug($request->get('title')), // Generate slug dynamically
                "short_description" => $request->get('short_description'),
                "description" => $data['description'] ?? null,
                // "education_experience_card" => $request->get('education_experience_card'),
                "status" => $request->get('status'),
                "cover_image" => $data['cover_image'] ?? null,
                "created_by" => Auth::user()->id,
            ]);

            return redirect()->back()->with('status', 'Career created successfully!');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }

    public function career_edit($id)
    {
        $career =  Career::find($id);
        if ($career == null) {
            return redirect('/admin/career')->with('error_message_catch', 'Institute not found!');
            // dd("error");
        }

        $careerData =  (new CareerResource($career))->toArray(request());
        $title = 'Edit Career';
        $heading = 'Edit Career';
        return view('admin.career.edit', compact('title', 'heading', 'careerData'));
    }


    public function career_update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        try {
            $career = Career::findOrFail($id);

            if ($career != null) {

                if ($request->hasFile('cover_image')) {
                    // dd('sssssss');
                    $cover_image = $request->file('cover_image');

                    // Create a new Request instance and merge the file and folder name
                    $requestData = new Request([
                        'folder_name' => 'career',
                    ]);

                    // Add the file to the request
                    $requestData->files->set('image', $cover_image);

                    // Create a new instance of the ImageUploadRequest using the Request data
                    $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);

                    // Create an instance of ImageController
                    $imageController = new ImageController();

                    // Call the upload_image_s3_only method and get the response
                    $response = $imageController->upload_image_storage_only($imageUploadRequest);

                    // Decode the response to get the data
                    $responseImageData = json_decode($response->getContent(), true);
                    // dd($responseImageData);
                    // Check if the response is successful and set the cover_image data
                    if ($responseImageData['success']) {
                        $data['cover_image'] = $responseImageData['data']['imagePath'];
                    }
                } else {
                    // dd('sssssssvvvvvvv');
                    $data['cover_image'] = $career->cover_image;
                }

                $career->title = $request->get('title') ?? null;
                // $career->slug = Str::slug($request->get('title'));
                $career->short_description = $request->get('short_description') ?? null;
                $career->status = $request->get('status');
                $career->description = $request->get('description');
                $career->cover_image = $data['cover_image'] ?? null;
                // $career->education_experience_card = $request->get('education_experience_card');
                $career->updated_by = auth()->id();
                $career->save();
                return redirect('admin/career/edit/' . $id)->with('status', 'Career updated successfully!');
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
            $career = Career::find($id);

            if (!$career) {
                return response()->json([
                    'success' => false,
                    'message' => "Career not found",
                    'data' => null
                ], 404);
            }

            // Update deleted_by before deleting
            $career->deleted_by = auth()->id(); // Assuming authentication is used
            $career->save();

            // Now delete the record
            $career->delete();

            return response()->json([
                'success' => true,
                'message' => "Career deleted successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }


    public function submitJobInterest(Request $request)
    {

        try {

            $data = $request->all();
            // dd($data);
            $resume_fullPath = null;
            if ($request->hasFile('resume')) {
                $resumeFileName = time() . '.' . $request->file('resume')->extension();
                if (!File::exists("resume")) {
                    File::makeDirectory("resume", 0777, true); // Recursively create directories
                }
                $request->resume->move(public_path('resume'), $resumeFileName);
                $resume_fullPath = 'resume/' . $resumeFileName;
                //dd($resume_fullPath);

            } else {
                return redirect()->back()->with('error_message_catch', 'Resume not uploaded successfully!');
            }

            $career = JobInterest::create([
                "fullname" => $request->get('fullname'),
                "email" => $request->get('email'), // Generate slug dynamically
                "phone_no" => $request->get('phone_no'),
                "interest_description" => $request->get('interest_description') ?? null,
                "role_description" => $request->get('role_description'),
                "resume" => $resume_fullPath,
                "career_id" => $request->get('career_id'),

                //"created_at" => auth()->id(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Thank you for showing your interst!',
            ]);
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return response()->json(['status' => false, 'message' =>  $e->getMessage()], 400);
        }
    }

    public function jobInterested()
    {
        $title = 'Gresham Global';
        $heading = 'Job Interested';
        return view('admin.career.job_interested', compact('title', 'heading'));
    }

    public function allJobInterested(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 10); // Number of items per page
            $page = $request->input('page', 1); // Current page
            $search = $request->input('search.value');
            $columnName = "id"; // Default sort column
            if ($request->has("sort_column")) {
                switch ($request->input('sort_column')) {
                    case 'fullname':
                        $columnName = "fullname";
                        break;
                    case 'email':
                        $columnName = "email";
                        break;
                    case 'interest_description':
                        $columnName = "interest_description";
                        break;
                    default:
                        # code...
                        break;
                }
            }
            $sortColumn = $columnName;
            $sortDirection = $request->input('fullname', 'desc');

            // Calculate offset based on page and per_page
            $offset = $request->input('start', 0); //($page - 1) * $perPage;

            //echo $page." -- ".$offset." -- ".$perPage;

            $query = JobInterest::query()
                ->leftJoin('careers', 'job_interests.career_id', '=', 'careers.id')
                ->select('job_interests.*', 'careers.title as career_title');


            $total = $query->count();
            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('fullname', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('careers.title', 'like', "%$search%");
                });
            }


            // Apply sorting and pagination
            $filterCount = $query->count();
            $jobs = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();
            //echo $careers;
            //dd($careers);

            $pagination = [
                'page' => (int)$page,
                'perPage' => $perPage,
                'total' => $total,
                'filterCount' => $filterCount,
            ];

            if ($jobs->isNotEmpty()) {
                $result = [
                    'draw' => $request->input('draw'),
                    'recordsTotal' => $pagination['total'], // Total records without filtering
                    'recordsFiltered' => $pagination['filterCount'], // Total records after filtering (if applicable)
                    'data' => JobResource::collection($jobs), // Actual data to be displayed
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

    public function delete_job(Request $request)
    {
        $id = $request->input('id');

        try {
            $job = JobInterest::find($id);

            if (!$job) {
                return response()->json([
                    'success' => false,
                    'message' => "Job not found",
                    'data' => null
                ], 404);
            }

            // Update deleted_by before deleting
            //$career->deleted_by = auth()->id(); // Assuming authentication is used
            $job->save();

            // Now delete the record
            $job->delete();

            return response()->json([
                'success' => true,
                'message' => "Job deleted successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    public function job_view($id)
    {
        $job =  JobInterest::find($id);
        if ($job == null) {
            return redirect('/admin/career')->with('error_message_catch', 'Institute not found!');
            // dd("error");
        }

        $jobData =  (new JobResource($job))->toArray(request());
        $title = 'View Job';
        $heading = 'View Job';
        return view('admin.career.view_job', compact('title', 'heading', 'jobData'));
    }


    public function downloadJob(Request $request)
    {
        try {
            $title = "Gresham Global";
            $heading = 'Job Entries';
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = JobInterest::with('career');

            if ($startDate && $endDate) {
                $startDateTime = Carbon::parse($startDate)->startOfDay();
                $endDateTime = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
            }

            $jobInterests1 = $query->orderBy('created_at', 'desc')->get();

            $jobInterests =  JobResource::collection($jobInterests1);
            // Check if there are any records to export
            if ($jobInterests->isEmpty()) {
                return view('admin.common.enquires-download', compact('title', 'heading'));
            }
            // dd($jobInterests1,$jobInterests);
            // Generate CSV data
            $csvData[] = [
                'Sr. No',
                'Full Name',
                'Email',
                'Phone No',
                'Job Position Applied',
                'Interest Description',
                'Role Description',
                'Resume',
                'Date'
            ];

            foreach ($jobInterests as $index => $jobInterest) {
                $csvData[] = [
                    $index + 1, // Sr. No
                    $jobInterest->resource->fullname, // Full Name
                    $jobInterest->resource->email, // Email
                    $jobInterest->resource->phone_no, // Phone No
                    $jobInterest->resource->career->title ?? '', // Job Position Applied (Career Title)
                    $jobInterest->resource->interest_description ?? '', // Interest Description
                    $jobInterest->resource->role_description ?? '', // Role Description
                    !empty($jobInterest->resource->resume)
                        ? url($jobInterest->resource->resume)
                        : '', // Resume with full URL
                    Carbon::parse($jobInterest->resource->created_at)
                        ->timezone('Asia/Kolkata')
                        ->format('Y-m-d h:i:s A'), // Date
                ];
            }

            // Create CSV file

            $fileName = 'job_entries_' . now()->format('Y-m-d_H-i-s') . '.csv';
            $fileContents = "";
            foreach ($csvData as $value) {
                $fileContents .= $value[0] . "," . $value[1] . "," . $value[2] . "," . $value[3] . "," . $value[4] . "," . $value[5] . "," . $value[6] . "," . $value[7] . "," . $value[8] . "\n";
            }
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            echo $fileContents;
            exit();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return view('admin.common.enquires-download', compact('title', 'heading'));
        }
    }


    public function careers_openings()
    {
        $careers = Career::where('status', 'active')
            ->orWhere('status', 'inactive')
            ->orderBy('created_at', 'desc')
            ->paginate(9) // Change '9' to the number of items per page you want
            ->map(function ($item) {
                $item->created_at_human = $item->created_at->diffForHumans();
                return $item;
            });

        return view('website.career-openings', compact('careers'));
    }
}
