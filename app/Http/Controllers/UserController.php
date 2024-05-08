<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users')); // Fixed variable name
    }

    public function create()
    {
        return view('user.create'); // Fixed view name
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', // Fixed table name
            'password' => 'required|min:6',
        ]);

        User::create($validatedData);

        return redirect()->route('user.index')->with('success', 'User created successfully'); // Fixed route name
    }

    public function show(User $user)
    {
        return view('user.show', compact('user')); // Fixed view name
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user')); // Fixed view name
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Fixed table name
            'password' => 'nullable|min:6',
        ]);

        $user->update($validatedData);

        return redirect()->route('user.show', $user)->with('success', 'User updated successfully'); // Fixed route name
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully'); // Fixed route name
    }
}
