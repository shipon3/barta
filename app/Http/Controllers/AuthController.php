<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
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

    public function register(RegistrationRequest $request)
    {
        dd($request->validated());
    }
}
