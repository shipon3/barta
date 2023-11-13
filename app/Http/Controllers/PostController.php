<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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
        $data[] = [
            'uuid' => Str::uuid()->toString(),
            'description' => $request->description,
            'user_id' => $auth->id,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ];
        DB::table('posts')->insert($data);
        return back()->with('message', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uu_id)
    {

        $post = DB::table('posts')
            ->where('uuid', $uu_id)
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.f_name', 'users.l_name', 'users.user_name')
            ->first();
        DB::table('posts')
            ->where('uuid', $uu_id)
            ->update(
                [
                    'view_count' => $post->view_count + 1,
                ]
            );
        return view('post.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uu_id)
    {
        $post = DB::table('posts')
            ->where('uuid', $uu_id)
            ->first();
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uu_id)
    {
        DB::table('posts')
            ->where('uuid', $uu_id)
            ->update(
                [
                    'description' => $request->description,
                    'image' => $request->image ?? null,
                ]
            );
        return redirect()->route('dashboard.index')->with('message', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uu_id)
    {
        DB::table('posts')->where('uuid', $uu_id)->delete();
        return back()->with('message', 'Post successfully deleted');
    }
}
