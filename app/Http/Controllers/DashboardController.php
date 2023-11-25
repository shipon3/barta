<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $posts = Post::with(['user'])->orderBy('id', 'desc')->get();
        return view('post.index', compact('posts'));
    }
}
