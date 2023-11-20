<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $posts = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.f_name', 'users.l_name', 'users.user_name', 'users.uuid')
            ->orderBy('id', 'desc')
            ->get();
        return view('post.index', compact('posts'));
    }
}
