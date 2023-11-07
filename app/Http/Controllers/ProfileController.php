<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index(): View
    {
        return view('auth.profile');
    }

    public function edit(): View
    {
        $auth_user = Auth::user();
        return view('auth.edit-profile', compact('auth_user'));
    }
}
