<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = DB::table('posts')
            ->latest()
            ->paginate(1);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::find($post);

        return $post;
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required'
        ]);

        Post::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
        ]);

        return redirect()->home();
    }
}
