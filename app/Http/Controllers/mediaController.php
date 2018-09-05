<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $file = $request->file('file');
        $file_type = $file->extension();

        // Check file type for images
        if (!preg_match('/(jpg|jpeg|png|gif)$/i', $file_type)) {
            return response('File MIME Type not Allowed', 422);
        }

        // Get the file from the request, and store it
        // $path represents where the file is in the application
        $path = Storage::putFile('public', $file);

        // Return the asset url
        // Storage::url will return the public url path of the file
        // The asset helper will prepend the site url
        return asset(Storage::url($path));
    }
}
