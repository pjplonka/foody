<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'user' => new User(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        User::create($payload);

        return redirect('/users')->with('success', 'Success.');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'users' => User::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $payload = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user->update($payload);

        return redirect('/users')->with('success', 'Success.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success', 'Success.');
    }
}
