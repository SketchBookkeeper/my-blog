<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use \App\Post;
use \App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
    }

    public function index($per_page)
    {
        $posts = DB::table('posts')
            ->latest()
            ->paginate($per_page);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::find($post);

        return $post;
    }

    public function manage(Request $request)
    {
        // Paginating with Pivot Table data can be tricky.
        // We need to call ::with on the Post Model to get the posts
        // and their tags.
        $all_posts = Post::with('tags')
        ->latest()
        ->get()
        ->toArray();

        // Handle a page parameter if given.
        $page = 1;
        //
        if ($request->input('page') && is_numeric($request->input('page'))) {
            $page = $request->input('page');
        }

        // Get how many items we need to offset by.
        // Take page and multiple it by desired per page count,
        // then minus per page count, leaving the items that will show
        // on that page.
        $offset_count = ($page * 9) - 9;

        // Slice out the posts that will be passed to the Paginator
        $selected_posts = array_slice($all_posts, $offset_count, 9);

        $posts = new LengthAwarePaginator($selected_posts, count($all_posts), 9, $page);

        // Set the custom pagination url
        $posts->withPath('/admin/posts');

        return view('posts.manage', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::get();

        return view('posts.create', compact('tags'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::get();
        $active_tags = $post
            ->tags
            ->pluck('name')
            ->toArray();

        return view('posts.edit', compact('post', 'tags', 'active_tags'));
    }

    public function update()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'id' => 'required'
        ]);

        $post = Post::find(request('id'));

        // Rerun sluggable for new title
        $post->slug = null;
        $post->update(['title' => request('title')]);
        $post->excerpt = request('excerpt');
        $post->body = request('body');

        $post->touch();
        $post->save();

        $post->tags()->sync(request('tags'));

        return redirect("/admin/edit/post/$post->slug");
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

        return redirect('/admin/posts');
    }
}
