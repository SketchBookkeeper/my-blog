<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Post;
use \App\Tag;

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
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::find($post);

        return $post;
    }

    public function create()
    {
        $tags = Tag::get();

        return view('posts.create', compact('tags'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
        ]);

        // Add Tags to the post
        $post->tags()->sync(request('tags'));

        return redirect()->home();
    }
}
