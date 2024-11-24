<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
       $users = User::all(); // Fetch all users

        return Inertia::render('Users', ['users' => $users]);
    }

    public function register()
    {
        return Inertia::render('Auth.Register');
    }

    public function store(Request $request)
    {

        // Validate
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        // Store
        $user = User::create($fields);

        // Login
        Auth::login($user);

        // Redirect
        return redirect()->route('home');
    }

    public function about()
    {
        return Inertia::render('About', ['title' => 'About Us']);
    }
}
