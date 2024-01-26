<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
Use App\Http\Requests\CommentsRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $request, Comment $comment)
{
    if (auth()->check()) {

    $comment = new Comment;
    $comment->content = $request->input('content');
    $comment->post_id = $request->input('post_id');
    $comment->user_id = auth()->user()->id;

    $comment->save();

      return redirect()->back()->with('success', 'Comment added successfully!');
    } else {
        return "You need to login ";
    }



}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
