<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
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
    public function store(PostRequest $request)
    {
        $auth = Auth::user();
        $data = $request->validated();
        $data['user_id'] = $auth->id;
        $data['uuid'] = Str::uuid()->toString();
        Post::create($data);
        return back()->with('message', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uu_id)
    {
        // dd($uu_id);
        $post = Post::where('uuid', $uu_id)->first();
        $post->view_count += 1;
        $post->save();
        $comments = Comment::with(['author'])->where('post_id', $post->id)->get();
        return view('post.post', compact(['post', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uu_id)
    {
        $post = Post::where('uuid', $uu_id)->first();
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $uu_id)
    {
        $data = $request->validated();
        if ($request->image) {
            $data['image'] = $request->image;
        }
        $post = Post::where('uuid', $uu_id)->first();
        $post->update($data);
        return redirect()->route('dashboard.index')->with('message', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uu_id)
    {
        try {
            $post = Post::where('uuid', $uu_id)->first();
            $post->delete();
            return back()->with('message', 'Post successfully deleted');
        } catch (\Exception $e) {
            return back()->with('message', 'Post can\'t deleted');
        }
    }

    public function userPost(string $uuid)
    {
        $user = User::with(['posts'])->where('uuid', $uuid)->first();
        return view('profile.profile', compact(['user']));
    }
}
