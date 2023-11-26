<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(CommentRequest $request, $post_id)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $post_id;
        Comment::create($data);
        return back()->with('message', 'Thank you for your comment');
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
    public function edit(string $post_uuid, string $comment_id)
    {
        $post = Post::with(['comments'])->where('uuid', $post_uuid)->first();
        $comment = Comment::where('id', $comment_id)->first();
        return view('post.edit-comment', compact(['post', 'comment']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $data = $request->validated();
        $comment = Comment::with(['post'])->find($id);
        $comment->update($data);
        return redirect()->route('post.single', $comment->post->uuid)->with('message', 'Comment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('message', 'Comment successfully deleted');
    }
}
