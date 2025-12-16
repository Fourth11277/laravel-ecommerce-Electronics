<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = \App\Models\Product::count();
        $totalCategories = \App\Models\Category::count();
        $totalOrders = \App\Models\Order::count();
        $totalUsers = \App\Models\User::where('is_admin', false)->count();
        $recentOrders = \App\Models\Order::with('user')->latest()->limit(5)->get();
        
        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalOrders', 'totalUsers', 'recentOrders'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function showRegister()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'admin_key' => 'required|string',
        ]);

        
        $adminKey = env('ADMIN_REGISTRATION_KEY', 'admin123456');
        
        if ($request->admin_key !== $adminKey) {
            return back()->withErrors([
                'admin_key' => 'Invalid admin registration key.',
            ])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true,
        ]);

        return redirect()->route('login')->with('success', 'Admin account created successfully! Please login.');
    }
}


