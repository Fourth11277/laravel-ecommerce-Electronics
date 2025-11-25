<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        return redirect()->route('dashboard')->with('success', 'Welcome to ElectroMart!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created successfully! Welcome to ElectroMart!');
    }

    public function logout()
    {
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
