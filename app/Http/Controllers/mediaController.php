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


        // Get the file from the request, and store it
        // $path represents where the file is in the application
        $path = Storage::putFile('public', $request->file('file'));

        // Return the asset url
        // Storage::url will return the public url path of the file
        // The asset helper will prepend the site url
        return asset(Storage::url($path));
    }
}
