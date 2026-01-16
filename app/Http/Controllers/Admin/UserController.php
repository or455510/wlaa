<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('points')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $user->update([
            'role' => request('role'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User role updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted!');
    }
}
