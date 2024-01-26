<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Models\Comment;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('Posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('Posts.create',compact('category'));
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
        $comment = Comment::all();
        $category = Category::all();
        $post = Post::findorfail($id);

        return view('Posts.show',compact('post','category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        return view('Posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, $id)
    {
        $post = Post::findorfail($id);
        $post->title  = $request->input('title');
        $post->description  = $request->input('description');
        $post->category  = $request->input('category_Id');



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $post->image = $imageName;
        }


        $post->update();

        return redirect()->route('Posts.index')->with('success', 'Post updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post-> delete();
        return redirect()->route('Posts.index')->with('success', 'Post deleted successfully!');
    }
    public function latestPost(){
         // Fetch all categories from the database
         $categories = Category::all();
         $post = Post::all();

         // Fetch the latest post for each category
         $latestPosts = [];
         foreach ($categories as $category) {
             $latestPost = Post::whereHas('category', function ($query) use ($category) {
                 $query->where('name', $category->name);
             })
             ->latest()        ->first();
             if ($latestPost) {
                 $latestPosts[$category->name] = $latestPost;
             }
            }



        return view('welcome', compact('latestPosts','post'));

    }

}
