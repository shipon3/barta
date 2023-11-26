<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index(): View
    {
        $profile = Auth::user();
        return view('auth.profile', compact('profile'));
    }

    public function edit(): View
    {
        $auth_user = Auth::user();
        return view('auth.edit-profile', compact('auth_user'));
    }

    public function changePassword(): View
    {
        return view('auth.password-change');
    }

    public function passwordStore(PasswordChangeRequest $request): RedirectResponse
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('profile.index')->with('message', 'Password has been changed');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $user->f_name = $request->first_name;
        $user->l_name = $request->last_name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();
        return redirect()->route('profile.index')->with('message', 'Profile has been updated');
    }
}
