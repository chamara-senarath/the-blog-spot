<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show login form
    public function login()
    {
        return view('users.login');
    }

    // Show register form
    public function create()
    {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Show user profile
    public function show()
    {
        return view('users.show', ['user' => auth()->user()]);
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('profile-image')) {
            $formFields['image'] = $request->file('profile-image')->store('images', 'public');
        }

        $user['name'] = $formFields['name'];
        if (!empty($formFields['image'])) {
            $user['image'] = $formFields['image'];
        }

        $user->save();

        return redirect()->route('users.show', ['user' => $user])->with('success', 'User profile updated successfully');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout
    public function logout()
    {
        auth()->logout();
        return redirect(route('blogs.index'));
    }
}
