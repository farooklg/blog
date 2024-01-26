<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('Admin.Posts.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('Admin.Posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request, Post $post)
    {
        $post->title  = $request->input('title');
        $post->description  = $request->input('description');
        $post->category_id  = $request->input('category_id');


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $post->image = $imageName;
        }


        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findorfail($id);
        return view('Admin.Posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::all();
        $post = Post::findorfail($id);
        return view('Admin.Posts.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, $id)
    {
        $post = Post::findorfail($id);
        $post->title  = $request->input('title');
        $post->description  = $request->input('description');
        $post->category_id  = $request->input('category_id');



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $post->image = $imageName;
        }


        $post->update();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = post::findorfail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
