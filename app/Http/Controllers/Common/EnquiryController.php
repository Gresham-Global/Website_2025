<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Enquiry;
use App\Models\NewsletterSubscription;
use Brevo\Client\Api\ContactsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\CreateContact;
use GuzzleHttp\Client;
use Carbon\Carbon;

class EnquiryController extends Controller
{
    public function submitEnquiry(Request $request)
    {
        //dd($request->all());
        // Validate form fields
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|regex:/^[a-zA-Z\s\-]+$/',
            'email' => 'required|email',
            'designation' => 'required|string',
            'organisation' => 'required|string',
            'services' => 'required',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first() // Send first validation error
            ]);
        }

        // You can store the data in the database if needed
        Enquiry::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Your enquiry has been submitted successfully!'
        ]);
    }

    public function subscribeToNewsletter(Request $request) {
        // Validate the email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first('email')
            ], 422);
        }

        // Check if email already exists
        $existingSubscription = NewsletterSubscription::where('email', $request->email)->first();

        if ($existingSubscription) {
            return response()->json([
                'status' => true,
                'message' => 'Subscription successful!'
            ]);
        }

        // Store the email in the database
        $subscription = NewsletterSubscription::create([
            'email' => $request->email
        ]);
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Subscription successful! '
        // ]);
        // Add the email to Brevo CRM
        
        try {
            $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
            $apiInstance = new ContactsApi(new Client(), $config);

            // Create an instance of CreateContact
            $contact = new CreateContact([
                'email' => $request->email,
                'listIds' => [(int) env('BREVO_LIST_ID')] // Fetching List ID from .env
            ]);

            $apiInstance->createContact($contact);

            return response()->json([
                'status' => true,
                'message' => 'Subscription successful!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to subscribe: ' . $e->getMessage()
            ], 500);
        }
    }


        //================  for Admin   =======================
    public function index($contactid = null){
        $title = 'Gresham Global';
        $heading = 'Enquries';
        //dd(session()->all());
        /*  $tags = Tag::orderBy('created_at', 'desc')
                                ->get(); */
            
            //dd($tags);
        //return view('admin.tag.index',compact('title', 'tags'));
        return view('admin.contact.index',compact('title', 'heading'));
        }

    public function contact_all(Request $request){
        try {
            // dd($request->input('start'),$request->input('length'),$request);
            $perPage = $request->input('length', 10); // Number of items per page
            $page = $request->input('page', 1); // Current page
            $search = $request->input('search.value');
            $columnName="created_at";// Default sort column
            $sortColumn="";
            
            $sortColumn = ($request->has("sort_column"))?$request->input('sort_column'):$columnName; 
            // dd($sortColumn,$columnName,$request->has("sort_column"));
            $sortDirection = $request->input('created_at', 'desc');

            // Calculate offset based on page and per_page
            // $offset = ($page - 1) * $perPage;

            $offset = $request->input('start');

            $query = Enquiry::query();
            $total = $query->count();
            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('full_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
                });
            }

            // Apply sorting and pagination
            $filterCount = $query->count();
            $tag = $query->orderBy($sortColumn, $sortDirection)
                              ->offset($offset)
                              ->limit($perPage)
                              ->get();
            $pagination = [
                'page' => (int)$page,
                'perPage' => $perPage,
                'total' => $total,
                'filterCount' => $filterCount,
            ];
            //dd($tag);
            if ($tag->isNotEmpty()) {
                $result = [
                    'draw' => $request->input('draw'),
                    'recordsTotal' => $total, // Total records without filtering
                    'recordsFiltered' => $filterCount, // Total records after filtering (if applicable)
                    'data' => $tag, // Actual data to be displayed
                ];
            }
            else
            {
                $result = [];
            }

            return response()->json($result);

        } catch (\Exception $e) {
            // dd($e);
            $result = [];
            return response()->json($result);
        }
    }

    public function contact_delete(Request $request){
        $id = $request->input('id');
        //$apiBaseUrl = env('API_BASE_URL',null). 'facility/'.$id;
        try {
            
            $contact = Enquiry::where('id', $id)->first();
           

            if($contact != null){
                $contact->delete();
                $data['status']=true;
                $data['message']="Contact deleted succefully";
                return response()->json(['data' => $data]);
            }
            $data['status']=false;
            $data['message']="Contact not deleted ";
            return response()->json(['data' => $data]);
        } catch (\Exception $e) {
            // Handle exceptions, e.g., connection errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function downloadContact(Request $request)
    {
        try {
            $title="Gresham Global";
            $heading = 'Enquries';
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = Enquiry::query();

            // Apply date range filter
            if ($startDate && $endDate) {
                $startDateTime = Carbon::parse($startDate)->startOfDay();
                $endDateTime = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
            }

            $enquiries = $query->orderBy('created_at', 'desc')->get();

            // Check if there are any records to export
            // if ($enquiries->isEmpty()) {
            //     return view('admin.common.enquires-download',compact('title'));
            // }
            // dd($enquiries);
            // Generate CSV data
            $csvData[] = [
                'Sr. No',
                'Name',
                'Email',
                'Designation',
                'Organisation',
                'Services',
                'Message',
                'Date'
            ];

            foreach ($enquiries as $index => $enquiry) {
                $csvData[] = [
                    $index + 1, // Sr. No
                    $enquiry->full_name, // Name
                    $enquiry->email, // Email
                    $enquiry->designation ?? '', // designation
                    $enquiry->organisation ?? '', // organisation
                    $enquiry->services ?? '', // services
                    $enquiry->message, // message
                    Carbon::parse($enquiry->created_at)->timezone('Asia/Kolkata')->format('Y-m-d h:i:s A'), // Created At
                ];
            }

            // Create CSV file

            $fileName = 'enquiries_' . now()->format('Y-m-d_H-i-s') . '.csv';
            $fileContents="";
            foreach ($csvData as $value) {
                $fileContents.=$value[0].",".$value[1].",".$value[2].",".$value[3].",".$value[4].",".$value[5].",".$value[6].",".$value[7]."\n";
            }
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            echo $fileContents;
            exit();    
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return view('admin.common.enquires-download',compact('title','heading'));
        }
    }


    public function subscribe_index($contactid = null){
        $title = 'Gresham Global';
        $heading = 'Subscribe List';
        //dd(session()->all());
        /*  $tags = Tag::orderBy('created_at', 'desc')
                                ->get(); */
            
            //dd($tags);
        //return view('admin.tag.index',compact('title', 'tags'));
        return view('admin.contact.subscribe_index',compact('title', 'heading'));
        }

    public function subscribe_all(Request $request){
        try {
            // dd($request->input('start'),$request->input('length'),$request);
            $perPage = $request->input('length', 10); // Number of items per page
            $page = $request->input('page', 1); // Current page
            $search = $request->input('search.value');
            $columnName="created_at";// Default sort column
            $sortColumn="";
            
            $sortColumn = ($request->has("sort_column"))?$request->input('sort_column'):$columnName; 
            // dd($sortColumn,$columnName,$request->has("sort_column"));
            $sortDirection = $request->input('created_at', 'desc');

            // Calculate offset based on page and per_page
            // $offset = ($page - 1) * $perPage;

            $offset = $request->input('start');

            $query = NewsletterSubscription::query();
            $total = $query->count();
            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('full_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
                });
            }

            // Apply sorting and pagination
            $filterCount = $query->count();
            $tag = $query->orderBy($sortColumn, $sortDirection)
                              ->offset($offset)
                              ->limit($perPage)
                              ->get();
            $pagination = [
                'page' => (int)$page,
                'perPage' => $perPage,
                'total' => $total,
                'filterCount' => $filterCount,
            ];
            //dd($tag);
            if ($tag->isNotEmpty()) {
                $result = [
                    'draw' => $request->input('draw'),
                    'recordsTotal' => $total, // Total records without filtering
                    'recordsFiltered' => $filterCount, // Total records after filtering (if applicable)
                    'data' => $tag, // Actual data to be displayed
                ];
            }
            else
            {
                $result = [];
            }

            return response()->json($result);

        } catch (\Exception $e) {
            // dd($e);
            $result = [];
            return response()->json($result);
        }
    }

    public function downloadSubscribe(Request $request)
    {
        try {
            $title="Gresham Global";
            $heading = 'Subscription List';
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = NewsletterSubscription::query();

            // Apply date range filter
            if ($startDate && $endDate) {
                $startDateTime = Carbon::parse($startDate)->startOfDay();
                $endDateTime = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
            }

            $enquiries = $query->orderBy('created_at', 'desc')->get();

            // Check if there are any records to export
            // if ($enquiries->isEmpty()) {
            //     return view('admin.common.enquires-download',compact('title'));
            // }
            // dd($enquiries);
            // Generate CSV data
            $csvData[] = [
                'Sr. No',
                'Email',
                'Date'
            ];

            foreach ($enquiries as $index => $enquiry) {
                $csvData[] = [
                    $index + 1, // Sr. No
                    $enquiry->email, // Email
                    Carbon::parse($enquiry->created_at)->timezone('Asia/Kolkata')->format('Y-m-d h:i:s A'), // Created At
                ];
            }

            // Create CSV file

            $fileName = 'subscribe_list_' . now()->format('Y-m-d_H-i-s') . '.csv';
            $fileContents="";
            foreach ($csvData as $value) {
                $fileContents.=$value[0].",".$value[1].",".$value[2]."\n";
            }
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            echo $fileContents;
            exit();    
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return view('admin.common.enquires-download',compact('title','heading'));
        }
    }
    
}