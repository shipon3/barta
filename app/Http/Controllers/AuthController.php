<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('message', 'Welcome To Barta App');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function registerIndex()
    {
        return view('auth.register');
    }

    public function register(RegistrationRequest $request)
    {
        $validate_data = $request->validated();
        $data[] = [
            'f_name' => $validate_data['first_name'],
            'l_name' => $validate_data['last_name'],
            'user_name' => $validate_data['user_name'],
            'email' => $validate_data['email'],
            'password' => Hash::make($validate_data['password']),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('login')->with('message', 'Thank you for registration');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Thank you for use me');
    }
}
