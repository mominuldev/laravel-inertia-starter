<?php

namespace App\Http\Controllers;

use App\Models\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        //    $users = User::paginate(10); // Fetch all users

        $users = User::when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        })->paginate(10)->withQueryString(); // Fetch all users

        $searchTeam = $request->search;

        return Inertia::render('Users', ['users' => $users, 'searchTeam' => $searchTeam]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function storeUser(Request $request)
    {
        $fields = $request->validate([
            'avatar' => ['nullable', 'max:1024', 'file', 'mimes:png,jpg'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($request->hasFile('avatar')) {
            $fields['avatar'] = Storage::disk('public')->put('uploads/user/', $request->file('avatar'));
        }

        $user = User::create($fields);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function register()
    {
        return Inertia::render('Auth.Register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'avatar' => ['nullable', 'max:300', 'file', 'mimes:png,jpg'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($request->hasFile('avatar')) {
            // $file = $request->file('avatar');
            // $extension = $file->getClientOriginalExtension();
            // $filename = time() . '.' . $extension;
            // $file->move('uploads/user/', $filename);
            $fields['avatar'] = Storage::disk('public')->put('uploads/user/', $request->file('avatar'));
        }




        if ($request->hasFile('avatar')) {
            // $fields['avatar'] = Store;
        }

        // Store
        $user = User::create($fields);

        // Login
        Auth::login($user);

        // Redirect
        return redirect()->route('dashboard')->with('success', 'Welcome to the club!');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function login()
    {
        return Inertia::render('Auth.Login');
    }

    /**
     * Authenticate a user.
     *
     * @param Request $request
     * @return void
     */
    public function authenticate(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt
        if (Auth::attempt($fields, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout a user.
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $user = User::find($id);

        return Inertia::render('Users.Show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return Inertia::render('Users.Edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        // Validate
        $fields = $request->validate([
            'avatar' => ['nullable', 'max:1024', 'file', 'mimes:png,jpg'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($request->hasFile('avatar')) {
            $fields['avatar'] = Storage::disk('public')->put('uploads/user/', $request->file('avatar'));
        }

        // Update
        $user->update($fields);

        // Redirect
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
