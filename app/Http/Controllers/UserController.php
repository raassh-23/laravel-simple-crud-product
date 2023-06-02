<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(5);

        return view('users.index', compact('users'));
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function edit(User $user) {
        // 
    }

    public function update(Request $request, User $user) {
        //
    }

    public function destroy(User $user) {
        if ($user->id == auth()->user()->id) {
            return redirect()->route('users.index')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
