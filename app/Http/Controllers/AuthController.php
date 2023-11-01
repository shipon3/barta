<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('login');
    }
    public function registerIndex()
    {
        return view('register');
    }
}
