<?php
use Illuminate\Support\Facades\Storage;

// Get Image
function getImageUrl($imagePath)
{
    $image = '';
    if (config('app.env') === 'prod') {
        // s3 will implement later
        /*$exists = Storage::disk(env("UPLOAD_DRIVER", "public"))->exists($imagePath);

        if ($exists) {
            //get content of image
            $content = Storage::disk(env("UPLOAD_DRIVER", "public"))->get($imagePath);
            //get mime type of image
            $mime = Storage::mimeType($imagePath);
            //prepare response with image content and response code
            $response = Response::make($content, 200);
            //set header
            $response->header("Content-Type", $mime);
            // return response
            $image = $response;
        }*/
    } else {
        $image = asset(Storage::url($imagePath));
    }

    return $image;
}


function uploadImage($path, $file)
{
    return Storage::disk(env('UPLOAD_DRIVER', 'public'))->put($path, file_get_contents($file), 'public');
}

function base64ToImageConvert($base64File, $imagePath, $fileExtension)
{
    $file = base64_decode($base64File);

    $filename = uniqid('') . $fileExtension;
    $driver = env("UPLOAD_DRIVER", "public");
    $filePath = $imagePath . $filename;
    Storage::disk($driver)->put($filePath, $file, "public");
    return $filePath;
}


