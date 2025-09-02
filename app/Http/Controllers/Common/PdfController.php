<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    private $successStatus = 200;

    public function upload_pdf_storage_only(Request $request)
    {
        try {
            $request->validate([
                'pdf' => 'required|file|mimes:pdf|max:2048',
                'folder_name' => 'required|string'
            ]);

            $folder_name = $request->get("folder_name");
            $milliseconds = round(microtime(true) * 1000);
            $pdfName = $folder_name."_".$milliseconds . '_' . uniqid() .'.'.$request->file('pdf')->getClientOriginalExtension();

            Storage::disk('public')->makeDirectory($folder_name);

            $path = Storage::disk('public')->putFileAs("$folder_name", $request->file('pdf'), $pdfName);

            $data = [
                'pdfPath' => Storage::url("$folder_name/$pdfName"),
                'selfSignedPath' => $this->generatePresignedUrl("$folder_name/$pdfName")
            ];

            return response()->json([
                'success' => true,
                'message' => "PDF uploaded successfully",
                'data' => $data
            ], $this->successStatus);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong.",
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function generatePresignedUrl($key)
    {
        $baseUrl = env('APP_URL');
        $filePath = public_path($key);

        if (file_exists($filePath)) {
            return $baseUrl . $key;
        }

        return $baseUrl . '/default-pdf.pdf'; // Optional fallback
    }
}
