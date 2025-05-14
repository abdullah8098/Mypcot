<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

public function profile(Request $request)
{
    $user = Auth::user();
    if ($request->isMethod('post')) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'gender' => 'required|in:male,female,other',
            'password' => 'nullable|string|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if ($request->filled('password') && !Hash::check($request->password, $user->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    return view('user.profile', compact('user'));
}
}
