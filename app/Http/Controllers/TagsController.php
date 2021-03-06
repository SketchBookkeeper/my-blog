<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        $posts = $tag->posts;

        return view('posts.index', compact('posts'));
    }

    public function manage()
    {
        $tags = Tag::get();

        return view('tags.manage', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function show()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // First check if a tag with this name already exists.
        $duplicate = Tag::where('name', '=', request('name'))->first();

        if ($duplicate) {
            return back()->withErrors([
                'message' => 'That tag name is already taken, please pick something else.'
            ]);
        }

        $this->validate(request(), [
            'name' => 'required',
            'color' => 'required'
        ]);

        Tag::create([
            'name' => request('name'),
            'color' => request('color')
        ]);

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'color' => 'required'
        ]);

        $tag = Tag::find(request('id'));

        $tag->name = request('name');
        $tag->color = request('color');

        $tag->save();

        return redirect('/admin/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $tag = Tag::find(request('id'));

        // This will remove all reference of this tag in the post_tag pivot table
        Tag::deleting(function ($tag)
        {
            $tag->posts()->detach();
        });

        Tag::destroy($tag->id);

        return back();
    }
}
