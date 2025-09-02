<?php

// app/Http/Controllers/ImageController.php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Storage;
// use Aws\S3\S3Client;



class ImageController extends Controller
{
    
    private $successStatus=200;

    public function upload_image_only(ImageUploadRequest $request)
    {

        try{
            $folder_name=$request->get("folder_name");
            $milliseconds = round(microtime(true) * 1000);

            // $imageName = $folder_name."_".time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $folder_name."_".$milliseconds . '_' . uniqid() .'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/'.$folder_name), $imageName);
            $data['awsPath']="";
            $data['imagePath']='images/'.$folder_name."/".$imageName;
            $data['selfSignedPath']="";

            return response()->json([
                'success'=> true,
                'message'=> "Image uploaded successfully",
                'data' => $data
            ], $this->successStatus);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message'=> "Something wrong.",
                'data' => $e->getMessage()
            ], $this->successStatus); 
        } 
    }


    public function upload_image_storage_only(ImageUploadRequest $request)
    {
        try {
            $folder_name = $request->get("folder_name");
            $milliseconds = round(microtime(true) * 1000);
            $imageName = $folder_name."_".$milliseconds . '_' . uniqid() .'.'.$request->image->getClientOriginalExtension();

            // Ensure directory exists
            Storage::disk('public')->makeDirectory("$folder_name");

            // Store the image explicitly in the public disk
            $path = Storage::disk('public')->putFileAs("$folder_name", $request->file('image'), $imageName);

            $data = [
                'awsPath' => "", 
                'imagePath' => Storage::url("$folder_name/$imageName"),
                'selfSignedPath' => ""
            ];
            
            return response()->json([
                'success' => true,
                'message' => "Image uploaded successfully",
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong.",
                'data' => $e->getMessage()
            ], 500); 
        } 
    }

    public function upload_image_s3_only(ImageUploadRequest $request)
    {

        try{
            $folder_name=$request->get("folder_name");
            $milliseconds = round(microtime(true) * 1000);

            // $imageName = $folder_name."_".time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $folder_name."_".$milliseconds . '_' . uniqid() .'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('images/'.$folder_name), $imageName);
            
            // $imageName = time().'.'.$request->image->extension();  
            // echo 'images/'.$folder_name."/".$imageName;
            $tempFilePath = $request->file('image')->path();
            // $uploadedPath = Storage::disk('s3')->put('images/'.$folder_name."/".$imageName, $request->image);
            $imagePath='images/'.$folder_name."/".$imageName;
            $uploadedPath = Storage::disk('s3')->put($imagePath, file_get_contents($tempFilePath));
            //echo  $uploadedPath;
            $path = Storage::disk('s3')->url($imagePath);
    
            /* Store $imageName name in DATABASE from HERE */
        
            // return back()
            //     ->with('success','You have successfully upload image.')
            //     ->with('image', $path); 

            $data['awsPath']=$path;
            $data['imagePath']=$imagePath;
            $data['selfSignedPath']=$this->generatePresignedUrl($imagePath);

            return response()->json([
                'success'=> true,
                'message'=> "Image uploaded successfully",
                'data' =>$data 
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message'=> "Something wrong.",
                'data' => $e->getMessage()
            ], 200); 
        } 
    }
    public function generatePresignedUrlold($key)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $bucket = env('AWS_BUCKET');

        // Generate a command to get the object
        $command = $s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $key,
        ]);

        // Create a presigned request
        $request = $s3->createPresignedRequest($command, '+20 minutes');

        // Get the presigned URL
        $presignedUrl = (string) $request->getUri();

        return $presignedUrl;
    }

    public function generatePresignedUrl_old($key)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $bucket = env('AWS_BUCKET');
        $baseUrl = env('BASE_URL'); // You can define BASE_URL in your .env file if it's not already

        try {
            // Check if the object exists
            $s3->headObject([
                'Bucket' => $bucket,
                'Key'    => $key,
            ]);

            // Generate a command to get the object
            $command = $s3->getCommand('GetObject', [
                'Bucket' => $bucket,
                'Key'    => $key,
            ]);

            // Create a presigned request
            $request = $s3->createPresignedRequest($command, '+20 minutes');

            // Get the presigned URL
            $presignedUrl = (string) $request->getUri();

            return $presignedUrl;

        } catch (\Aws\Exception\AwsException $e) {
            // If the object is not found, return a URL with the base URL and key
            return $baseUrl . '/' . $key;
        }
    }

    public function generatePresignedUrlCombined($key)
    {
        $baseUrl = env('BASE_URL'); // Define BASE_URL as the public URL of your app
        $localFilePath = public_path($key); // Check in the public folder directly

        // Check if the image exists in the public folder
        if (file_exists($localFilePath)) {
            // Return the local server URL if the file exists
            return $baseUrl . '/' . $key;
        }

        try {

            $s3 = new S3Client([
                'version' => 'latest',
                'region'  => env('AWS_DEFAULT_REGION'),
                'credentials' => [
                    'key'    => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                ],
            ]);
            $bucket = env('AWS_BUCKET');
            // Check if the object exists in the S3 bucket
            $s3->headObject([
                'Bucket' => $bucket,
                'Key'    => $key,
            ]);

            // Generate the command to get the object from S3
            $command = $s3->getCommand('GetObject', [
                'Bucket' => $bucket,
                'Key'    => $key,
            ]);

            // Create a presigned request for 20 minutes
            $request = $s3->createPresignedRequest($command, '+20 minutes');

            // Get the presigned URL
            $presignedUrl = (string) $request->getUri();

            return $presignedUrl;

        } catch (\Aws\Exception\AwsException $e) {
            // If not found in S3, return the base URL + key for the public folder
            return $baseUrl . '/' . $key; // Return the local path even if not found
        }
    }

    public function generatePresignedUrl($key)
    {
        $baseUrl = env('APP_URL'); // Use APP_URL instead of BASE_URL
        $filePath = public_path($key); // Path in public folder
        
        // If the file exists, return the full URL
        if (file_exists($filePath)) {
            // dd($filePath,$key,$baseUrl . $key);
            return $baseUrl . $key; // No need to add extra slash
        }

        return $baseUrl . '/default-image.png'; // Provide a fallback image
    }

}