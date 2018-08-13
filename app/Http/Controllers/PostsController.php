<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->latest()
            ->paginate(1);

        return view('posts.index', compact('posts'));
    }
}
