<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\PublicationsReport;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Http\Resources\Publications\PublicationsResources;
use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Common\PdfController;
use App\Http\Requests\Common\ImageUploadRequest;
use App\Models\PublicationTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BrevoTestMail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class PublicationController extends Controller
{

    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'Publications';
        return view('admin.publication.index', compact('title', 'heading'));
    }


    public function allPublication(Request $request)
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

            // Query the database for Publications 
            $query = Publication::query();

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
                    $q->where('publication.title', 'like', "%$search%")
                        ->orWhere('publication.tags', 'like', "%$search%");  // Include event title in search
                });
            }

            // Get the count of records after applying the search filter
            $filterCount = $query->count();

            // Apply sorting and limit for pagination
            $publications = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();

            // Return the paginated data as JSON
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,  // Total number of records (no filtering)
                'recordsFiltered' => $filterCount,  // Total number of records after filtering
                'data' => PublicationsResources::collection($publications),  // Paginated data
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
        $title = 'Create  Publications';
        $heading = 'Create Publications';
        // $publication_tags = Publication::select('id', 'tags')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('admin.publication.create', compact('title', 'heading', 'tags'));
    }

    public function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Publication::where('slug', $slug)
                ->when($ignoreId, function ($query, $ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_pdf' => 'nullable|file|mimes:pdf|max:2048', // max is in KB, so 2048 KB = 2 MB
            // You can add other validations here if needed
        ], [
            'report_pdf.mimes' => 'The report must be a PDF file.',
            'report_pdf.max' => 'The report PDF must not exceed 2 MB.',
        ]);
        try {
            $data = $request->all();
            // dd($data);
            $data['thumbnail_image'] = null;
            $data['banner_image'] = null;
            $data['mb_banner_image'] = null;
            $data['vertical_image'] = null;
            $data['report_pdf'] = null;
            $data['report_images'] = [];
            $reportCards = [];
            $keyHighlights = [];

            $imageController = new ImageController();

            // Handle thumbnail image
            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');

                $requestData = new Request(['folder_name' => 'publication']);
                $requestData->files->set('image', $thumbnail_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $data['thumbnail_image'] = $responseImageData['data']['imagePath'] ?? null;
                }
            }

            // Handle banner image
            if ($request->hasFile('banner_image')) {
                $banner_image = $request->file('banner_image');

                $requestData = new Request(['folder_name' => 'publication']);
                $requestData->files->set('image', $banner_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $data['banner_image'] = $responseImageData['data']['imagePath'] ?? null;
                }
            }

            if ($request->hasFile('mb_banner_image')) {
                $mb_banner_image = $request->file('mb_banner_image');

                $requestData = new Request(['folder_name' => 'publication']);
                $requestData->files->set('image', $mb_banner_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $data['mb_banner_image'] = $responseImageData['data']['imagePath'] ?? null;
                }
            }

            // Handle vertical image
            if ($request->hasFile('vertical_image')) {
                $vertical_image = $request->file('vertical_image');

                $requestData = new Request(['folder_name' => 'publication']);
                $requestData->files->set('image', $vertical_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($requestData);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $responseImageData = json_decode($response->getContent(), true);

                if (!empty($responseImageData['success'])) {
                    $data['vertical_image'] = $responseImageData['data']['imagePath'] ?? null;
                }
            }

            if ($request->hasFile('report_pdf')) {
                $report_pdf = $request->file('report_pdf');

                $requestData = new Request(['folder_name' => 'publication']);
                $requestData->files->set('pdf', $report_pdf);

                $pdfUploadRequest = Request::createFromBase($requestData);
                $pdfController = new PdfController();
                $response = $pdfController->upload_pdf_storage_only($pdfUploadRequest);
                $responsePdfData = json_decode($response->getContent(), true);

                if (!empty($responsePdfData['success'])) {
                    $data['report_pdf'] = $responsePdfData['data']['pdfPath'] ?? null;
                }
            }

            if (!empty($request->report_title) && is_array($request->report_title)) {
                for ($i = 0; $i < 3; $i++) {
                    $title = $request->input("report_title.$i");
                    $imagePath = null;

                    if ($request->hasFile("report_image.$i")) {
                        $image = $request->file("report_image.$i");
                        $baseRequest = new Request(['folder_name' => 'publication']);
                        $baseRequest->files->set('image', $image);

                        // Convert to ImageUploadRequest (your custom FormRequest)
                        $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);


                        $imageController = new ImageController();
                        $response = $imageController->upload_image_storage_only($imageUploadRequest);

                        $imageData = json_decode($response->getContent(), true);

                        if (!empty($imageData['success'])) {
                            $imagePath = $imageData['data']['imagePath'];
                        }
                    }

                    if ($i == 0 || ($title && $imagePath)) { // first is required
                        $reportCards[] = [
                            'report_title' => $title,
                            'report_image' => $imagePath,
                            'report_list' => $request->input("report_list.$i") ?? [],
                        ];
                    }
                }
            }

            $data['report_cards'] = $reportCards;

            if (!empty($request->highlight_description) && is_array($request->highlight_description)) {
                for ($i = 0; $i < 3; $i++) {
                    $description = $request->input("highlight_description.$i");
                    $iconPath = null;

                    // Check and upload icon if exists
                    if ($request->hasFile("highlight_icon.$i")) {
                        $iconFile = $request->file("highlight_icon.$i");

                        // Wrap into a base request for reuse
                        $baseRequest = new Request(['folder_name' => 'publication']);
                        $baseRequest->files->set('image', $iconFile);

                        $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                        $imageController = new ImageController();

                        $response = $imageController->upload_image_storage_only($imageUploadRequest);
                        $imageData = json_decode($response->getContent(), true);

                        if (!empty($imageData['success'])) {
                            $iconPath = $imageData['data']['imagePath'];
                        }
                    } else {
                        // fallback to old path if exists
                        $iconPath = $request->input("highlight_icon_url_original.$i");
                    }

                    $keyHighlights[] = [
                        'highlight_icon' => $iconPath,
                        'highlight_description' => $description,
                    ];
                }

                $data['key_highlights'] = $keyHighlights;
            }

            $data['gallery_images'] = [];

            if ($request->hasFile('gallery_images')) {
                $galleryImages = $request->file('gallery_images');
                $paths = [];

                foreach ($galleryImages as $image) {
                    $requestData = new Request(['folder_name' => 'publication/gallery']);
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
            $slug = $this->generateUniqueSlug($request->get('title'));


            $publication = Publication::create([
                "title" => $request->get('title'),
                "slug" => $slug,
                "short_description" => $request->get('short_description'),
                "description" => $data['description'] ?? null,
                "thumbnail_image" => $data['thumbnail_image'],
                "banner_image" => $data['banner_image'],
                "mb_banner_image" => $data['mb_banner_image'],
                "vertical_image" => $data['vertical_image'],
                "report_pdf" => $data['report_pdf'],
                'report_cards' => json_encode($reportCards),
                'key_highlights' => json_encode($keyHighlights),
                "share_link" => $request->get('share_link'),
                "created_by" => $user->id,
                "status" => $request->get('status', 'Active')
            ]);

            $tagIds = [];
            $tags = $request->tags ?? [];

            if (is_array($tags) && !empty($tags)) {
                foreach ($tags as $tagName) {
                    $formattedName = ucfirst(strtolower(trim($tagName)));

                    if (!empty($formattedName)) {
                        $tag = Tag::firstOrCreate(
                            ['name' => $formattedName],
                            ['created_at' => now(), 'updated_at' => now()]
                        );
                        $tagIds[] = $tag->id;
                    }
                }
            }

            // Sync without detaching others if needed, or use sync() if you want to replace
            $publication->tags()->sync($tagIds);

            return redirect()->back()->with('status', 'Publications created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error_message_catch', $e->getMessage());
        }
    }

    public function publication_edit($id)
    {
        $publications = Publication::findOrFail($id);

        if (!$publications) {
            return redirect('/admin/publication')->with('error_message_catch', 'Publications not found!');
        }

        // $publicationsData = (new PublicationsResources($publications))->toArray(request());
        $publicationsData = $publications->toArray();

        // Ensure report_cards is properly decoded
        $publicationsData['report_cards'] = json_decode($publications->report_cards, true) ?? [];

        // Ensure key_highlights is also decoded
        $publicationsData['key_highlights'] = json_decode($publications->key_highlights, true) ?? [];


        $title = 'Edit Publications';
        $heading = 'Edit Publications';

        $tags = Tag::select('id', 'name')->get();
        $publication_tags = PublicationTag::where('publication_id', $id)->get();



        return view('admin.publication.edit', compact(
            'title',
            'heading',
            'publicationsData',
            'publications',
            'tags',
            'publication_tags'
        ));
    }


    public function publication_update(Request $request, $id)
    {
        $request->validate([
            'report_pdf' => 'nullable|file|mimes:pdf|max:2048', // max is in KB, so 2048 KB = 2 MB
            // You can add other validations here if needed
        ], [
            'report_pdf.mimes' => 'The report must be a PDF file.',
            'report_pdf.max' => 'The report PDF must not exceed 2 MB.',
        ]);
        try {
            $publications = Publication::findOrFail($id);
            $data = $request->all();

            $thumbnail_image_path = null;
            $banner_image_path = null;
            $vertical_image_path = null;
            $report_pdf_path = null;

            $imageController = new ImageController();

            // Thumbnail image
            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');
                $baseRequest = new Request(['folder_name' => 'publication']);
                $baseRequest->files->set('image', $thumbnail_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $imageData = json_decode($response->getContent(), true);

                if (!empty($imageData['success'])) {
                    $thumbnail_image_path = $imageData['data']['imagePath'];
                }
            }

            // Banner image
            if ($request->hasFile('banner_image')) {
                $banner_image = $request->file('banner_image');
                $baseRequest = new Request(['folder_name' => 'publication']);
                $baseRequest->files->set('image', $banner_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $imageData = json_decode($response->getContent(), true);

                if (!empty($imageData['success'])) {
                    $banner_image_path = $imageData['data']['imagePath'];
                }
            }

            // Mobile Banner image
            if ($request->hasFile('mb_banner_image')) {
                $mb_banner_image = $request->file('mb_banner_image');
                $baseRequest = new Request(['folder_name' => 'publication']);
                $baseRequest->files->set('image', $mb_banner_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $imageData = json_decode($response->getContent(), true);

                if (!empty($imageData['success'])) {
                    $mb_banner_image_path = $imageData['data']['imagePath'];
                }
            }

            // Vertical image
            if ($request->hasFile('vertical_image')) {
                $vertical_image = $request->file('vertical_image');
                $baseRequest = new Request(['folder_name' => 'publication']);
                $baseRequest->files->set('image', $vertical_image);

                $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                $response = $imageController->upload_image_storage_only($imageUploadRequest);
                $imageData = json_decode($response->getContent(), true);

                if (!empty($imageData['success'])) {
                    $vertical_image_path = $imageData['data']['imagePath'];
                }
            }

            // PDF upload
            if ($request->hasFile('report_pdf')) {
                $pdf = $request->file('report_pdf');
                $baseRequest = new Request(['folder_name' => 'publication']);
                $baseRequest->files->set('pdf', $pdf);

                $pdfUploadRequest = Request::createFromBase($baseRequest);
                $pdfController = new PdfController();
                $response = $pdfController->upload_pdf_storage_only($pdfUploadRequest);
                $pdfData = json_decode($response->getContent(), true);

                if (!empty($pdfData['success'])) {
                    $report_pdf_path = $pdfData['data']['pdfPath'];
                }
            }

            // Slug update logic
            $slug = $this->generateUniqueSlug($request->get('title'), $publications->id);
            $publications->title = $request->get('title') ?? $publications->title;

            if ($slug !== $publications->slug) {
                $publications->slug = $slug;
            }

            $publications->short_description = $request->get('short_description') ?? null;
            $publications->description = $request->get('description') ?? null;

            $publications->thumbnail_image = $thumbnail_image_path ?? $request->input("thumbnail_image_url_original") ?? $publications->thumbnail_image;
            $publications->banner_image = $banner_image_path ?? $request->input("banner_image_url_original") ?? $publications->banner_image;
            $publications->mb_banner_image = $mb_banner_image_path ?? $request->input("mb_banner_image_url_original") ?? $publications->mb_banner_image;
            $publications->vertical_image = $vertical_image_path ?? $request->input("vertical_image_url_original") ?? $publications->vertical_image;
            $publications->report_pdf = $report_pdf_path ?? $request->input("report_pdf_url_original") ?? $publications->report_pdf;

            $publications->share_link = $request->get('share_link') ?? null;
            $publications->updated_by = Auth::user()->id ?? null;
            $publications->status = $request->get('status', 'Active');

            // Handle Report Cards
            $reportCards = [];
            if (!empty($request->report_title) && is_array($request->report_title)) {
                for ($i = 0; $i < 3; $i++) {
                    $title = $request->input("report_title.$i");
                    $imagePath = null;

                    if ($request->hasFile("report_image.$i")) {
                        $image = $request->file("report_image.$i");
                        $baseRequest = new Request(['folder_name' => 'publication']);
                        $baseRequest->files->set('image', $image);

                        $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                        $response = $imageController->upload_image_storage_only($imageUploadRequest);
                        $imageData = json_decode($response->getContent(), true);

                        if (!empty($imageData['success'])) {
                            $imagePath = $imageData['data']['imagePath'];
                        }
                    } else {
                        // fallback to old path
                        $imagePath = $request->input("report_image_url_original.$i");
                    }

                    if ($i === 0 || ($title && $imagePath)) {
                        $reportCards[] = [
                            'report_title' => $title,
                            'report_image' => $imagePath,
                            'report_list' => $request->input("report_list.$i") ?? [],
                        ];
                    }
                }

                $publications->report_cards = json_encode($reportCards);
            }

            // Handle Key Highlights
            $keyHighlights = [];
            if (!empty($request->highlight_description) && is_array($request->highlight_description)) {
                for ($i = 0; $i < 3; $i++) {
                    $description = $request->input("highlight_description.$i");
                    $iconPath = null;

                    if ($request->hasFile("highlight_icon.$i")) {
                        $icon = $request->file("highlight_icon.$i");
                        $baseRequest = new Request(['folder_name' => 'publication']);
                        $baseRequest->files->set('image', $icon);

                        $imageUploadRequest = ImageUploadRequest::createFromBase($baseRequest);
                        $response = $imageController->upload_image_storage_only($imageUploadRequest);
                        $imageData = json_decode($response->getContent(), true);

                        if (!empty($imageData['success'])) {
                            $iconPath = $imageData['data']['imagePath'];
                        }
                    } else {
                        // fallback to old icon path
                        $iconPath = $request->input("highlight_icon_url_original.$i");
                    }

                    if ($i === 0 || ($description && $iconPath)) {
                        $keyHighlights[] = [
                            'highlight_icon' => $iconPath,
                            'highlight_description' => $description,
                        ];
                    }
                }

                $publications->key_highlights = json_encode($keyHighlights);
            }


            $publications->save();
            // dd($request->tags);
            // Handle Tags
            $tagIds = [];
            $tags = $request->tags ?? [];
            if (!empty($tags) && is_array($tags)) {
                foreach ($tags as $tagName) {
                    $formattedName = ucfirst(strtolower(trim($tagName)));

                    if (!empty($formattedName)) {
                        $tag = Tag::firstOrCreate(
                            ['name' => $formattedName],
                            ['created_at' => now(), 'updated_at' => now()]
                        );
                        $tagIds[] = $tag->id;
                    }
                }

                $publications->tags()->sync($tagIds);
            }

            return redirect('admin/publication/edit/' . $id)->with('status', 'Publication updated successfully!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error_message_catch', 'Something went wrong! ' . $e->getMessage());
        }
    }



    public function delete(Request $request)
    {
        try {
            $publications = Publication::find($request->input('id'));

            if (!$publications) {
                return response()->json([
                    'success' => false,
                    'message' => "Publications not found",
                ], 404);
            }

            $publications->deleted_by = Auth::user()->id ?? null;
            $publications->save();
            $publications->delete();

            return response()->json([
                'success' => true,
                'message' => "Publications deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function publications_display(Request $request)
    {
        $paginate_count = env('PAGINATE_COUNT', 6);
        $page = $request->get('page', 1);

        // Set pagination context
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $publications = Publication::with('tags')
            ->where('status', 'Active')
            ->orderBy('created_at', 'desc')
            ->paginate($paginate_count);

        $total = Publication::where('status', 'Active')->count();

        if ($request->ajax()) {
            $html = view('website.publications.publications-card', compact('publications'))->render();
            return response()->json([
                'html' => $html,
                'count' => $publications->count(),
            ]);
        }

        return view('website.publications', compact('publications', 'total'));
    }

    public function show($slug)
    {
        $publications = Publication::with('tags')->where('slug', $slug)->firstOrFail();

        // Fetch all other publications as "similar" (limit optional)
        $similarPublications = Publication::where('status', 'Active')
            ->where('id', '!=', $publications->id)
            ->latest()
            ->take(6)
            ->get();

        // Decode any JSON fields
        $publications['report_cards'] = json_decode($publications->report_cards, true) ?? [];
        $publications['key_highlights'] = json_decode($publications->key_highlights, true) ?? [];

        return view('website.publications.detail', compact('publications', 'similarPublications'));
    }

    public function downloadReport(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email_id' => 'required|email|max:255',
            'report_url' => 'nullable|string',
        ]);

        // Save to DB
        DB::table('report_downloads')->insert([
            'full_name' => $validated['full_name'],
            'email_id' => $validated['email_id'],
            'report_url' => $validated['report_url'],
            'created_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    public function downloadReportSubmit(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email_id' => 'required|email|max:255',
            'report_url' => 'sometimes|max:2048', // Validate report_url (PDF URL)
            'publicationTitle' => 'sometimes|string|max:255', // New field for publication title
            'publicationId' => 'sometimes|integer', // New field for publication ID
        ]);

        // Fetch publication info using publicationId
        $publication = DB::table('publication')
            ->select('title', 'report_pdf') // Adjust column names as needed
            ->where('id', $validated['publicationId'])
            ->first();

        if (!$publication || empty($publication->report_pdf)) {
            return response()->json([
                'success' => false,
                'message' => 'Publication PDF not found.',
            ]);
        }

        // Store title and PDF file path in variables
        $validated['pdf_path'] = $publication->report_pdf;
        $validated['title'] = $publication->title;

        // Check if the email already exists in the database
        $exists = DB::table('publications_report')
            ->where('email_id', $validated['email_id'])
            ->where('publication_id', $validated['publicationId'])
            ->exists();

        if (!$exists) {
            // Insert the form data into the 'publications_report' table
            DB::table('publications_report')->insert([
                'full_name' => $validated['full_name'],
                'email_id' => $validated['email_id'],
                'report_url' => $validated['report_url'],
                'publication_title' => $validated['publicationTitle'],  // Insert publication title
                'publication_id' => $validated['publicationId'],        // Insert publication ID
                'created_at' => now(),
            ]);

            // Return success response
            // return response()->json([
            //     'success' => true,
            //     'message' => 'We’ve delivered the report to your inbox.Happy Reading!',
            //     'pdf_url' => $validated['report_url'],  // Send the PDF URL back to the frontend
            // ]);
        } else {
            // return response()->json([
            //     'success' => false,
            //     'message' => 'Email already exists.',
            // ]);
            // If the record exists, increment the count
            DB::table('publications_report')
                ->where('email_id', $validated['email_id'])
                ->where('publication_id', $validated['publicationId'])
                ->increment('count');  // Increment the count

        }
        $cleanPath = ltrim(str_replace('/storage/', '', $publication->report_pdf), '/');
        $fileFullPath = Storage::disk('public')->path($cleanPath);
        $validated['pdf_full_path'] = $fileFullPath;

        // Send the email using Brevo SMTP
        Mail::to($validated['email_id'])->send(new BrevoTestMail($validated));
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'We’ve delivered the report to your inbox. Happy Reading!',
            'pdf_url' => $validated['report_url'],  // Send the PDF URL back to the frontend
        ]);
    }



    // public function publications_display()
    // {


    //     $publications = Publication::with('tags')->where('status', 'Active')
    //         ->orderBy('created_at', 'desc')->paginate(9);

    //     return view('website.publications', compact('publications'));
    // }

    // public function show($slug)
    // {
    //     // Load publication by slug along with tags
    //     $publication = Publication::with('tags')->where('slug', $slug)->firstOrFail();

    //     return view('website.publications.detail', compact('publication'));
    // }

    public function publication_report()
    {
        $title = 'Gresham Global';
        $heading = 'Publications';
        return view('admin.publication.report', compact('title', 'heading'));
    }


    public function publication_report_all(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 6);
            $page = $request->input('page', 1);
            $search = $request->input('search');
            $sortColumn = $request->input('sort_column', 'id');
            $sortDirection = $request->input('sort_direction', 'desc');

            // Sanitize sort column
            $allowedSortColumns = ['id', 'title', 'report_count'];
            if (!in_array($sortColumn, $allowedSortColumns)) {
                $sortColumn = 'id';
            }

            $offset = ($page - 1) * $perPage;

            $query = DB::table('publication')
                ->leftJoin('publications_report', 'publication.id', '=', 'publications_report.publication_id')
                ->select(
                    'publication.id',
                    'publication.title',
                    DB::raw('COALESCE(SUM(publications_report.count), 0) as report_count')
                )
                ->groupBy('publication.id', 'publication.title');

            // if (!empty($search)) {
            //     $query->where(function ($q) use ($search) {
            //         $q->where('publications.title', 'like', '%' . $search . '%');
            //     });
            // }


            $total = DB::table('publication')->count();
            $filterCount = $query->count();

            $publications = $query
                ->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();
            // dd($query->toSql(), $query->getBindings());
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $filterCount,
                'data' => $publications,
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

    public function downloadPublication(Request $request)
    {
        try {
            // Get publication report data
            $sortColumn = $request->input('sort_column', 'id');
            $sortDirection = $request->input('sort_direction', 'desc');

            $allowedSortColumns = ['id', 'title', 'report_count'];
            if (!in_array($sortColumn, $allowedSortColumns)) {
                $sortColumn = 'id';
            }

            $publications = DB::table('publication')
                ->leftJoin('publications_report', 'publication.id', '=', 'publications_report.publication_id')
                ->select(
                    'publication.id',
                    'publication.title',
                    DB::raw('COALESCE(SUM(publications_report.count), 0) as report_count')
                )
                ->groupBy('publication.id', 'publication.title')
                ->orderBy($sortColumn, $sortDirection)
                ->get();

            // Streamed CSV response (no file saved)
            $response = new StreamedResponse(function () use ($publications) {
                $handle = fopen('php://output', 'w');

                // Header row
                fputcsv($handle, ['Sr. No', 'Title', 'Report Count']);

                foreach ($publications as $index => $publication) {
                    fputcsv($handle, [
                        $index + 1,
                        $publication->title,
                        $publication->report_count,
                    ]);
                }

                fclose($handle);
            });

            $fileName = 'publication_report_' . now()->format('Y-m-d_H-i-s') . '.csv';

            // Set headers for download
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');

            return $response;

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function publication_form_list()
    {
        $title = 'Gresham Global';
        $heading = 'Publications Form List';
        return view('admin.publication.form-list', compact('title', 'heading'));
    }

    public function publication_form_list_all(Request $request)
    {
        try {
            // dd($request->input('start'),$request->input('length'),$request);
            $perPage = $request->input('length', 10); // Number of items per page
            $page = $request->input('page', 1); // Current page
            $search = $request->input('search.value');
            $columnName = "created_at";// Default sort column
            $sortColumn = "";

            $sortColumn = ($request->has("sort_column")) ? $request->input('sort_column') : $columnName;
            // dd($sortColumn,$columnName,$request->has("sort_column"));
            $sortDirection = $request->input('created_at', 'desc');

            // Calculate offset based on page and per_page
            // $offset = ($page - 1) * $perPage;

            $offset = $request->input('start');

            $query = PublicationsReport::query();
            $total = $query->count();
            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('full_name', 'like', "%$search%")
                        ->orWhere('publication_title', 'like', "%$search%")
                        ->orWhere('email_id', 'like', "%$search%");
                });
            }

            // Apply sorting and pagination
            $filterCount = $query->count();
            $tag = $query->orderBy($sortColumn, $sortDirection)
                ->offset($offset)
                ->limit($perPage)
                ->get();
            $pagination = [
                'page' => (int) $page,
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
            } else {
                $result = [];
            }

            return response()->json($result);

        } catch (\Exception $e) {
            // dd($e);
            $result = [];
            // return response()->json($result);
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function downloadPublicationFormList(Request $request): StreamedResponse
    {
        $title = "Gresham Global";          // not used in stream, keep if view fallback needed
        $heading = 'Publication Form List';   // idem

        // Build base query
        $query = PublicationsReport::query();

        // Optional date range filter (inclusive start/end day)
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
            $startDateTime = Carbon::parse($startDate)->startOfDay();
            $endDateTime = Carbon::parse($endDate)->endOfDay();
            $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        // Sorting (latest first; change if needed)
        $query->orderBy('created_at', 'desc');

        // Build streamed CSV download (no temp file, low memory)
        $fileName = 'publication_form_list_' . now()->format('Y-m-d_H-i-s') . '.csv';
        $tz = 'Asia/Kolkata';

        return response()->streamDownload(function () use ($query, $tz) {
            $handle = fopen('php://output', 'w');

            // Header row
            fputcsv($handle, [
                'Sr. No',
                'Name',
                'Email',
                'Publication Title',
                'Publication download Count',
                'Date',
            ]);

            $i = 1;

            // Use cursor() to stream large datasets efficiently
            foreach ($query->cursor() as $row) {
                fputcsv($handle, [
                    $i++,
                    $row->full_name,
                    $row->email_id,
                    $row->publication_title,
                    $row->count,
                    Carbon::parse($row->created_at)->timezone($tz)->format('Y-m-d h:i:s A'),
                ]);
            }

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

}
