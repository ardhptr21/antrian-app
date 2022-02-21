<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function attempt(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:1|max:50',
            'password' => 'required|string|min:1',
        ]);


        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard:index');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
