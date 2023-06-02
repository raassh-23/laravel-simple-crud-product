<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;

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
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'digits_between:10,13'],
            'address' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            'role' => [new Enum(UserRoleEnum::class)],
        ]);

        $path = $user->profile_pic;

        if ($request->file('image')) {
            if ($user->profile_pic) {
                Storage::delete($user->profile_pic);
            }

            $path = Storage::putFile('user-images', $request->file('image'));
        }

        $newData = [
            'name' => $request->name,
            'profile_pic' => $path,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        if ($request->password) {
            $newData['password'] = Hash::make($request->password);
        }

        if ($request->role) {
            $newData['role'] = $request->role;

            if ($user->id === auth()->user()->id) {
                return redirect()->back()->with('error', 'Tidak dapat mengubah role sendiri');
            }
        }

        $success = $user->update($newData);

        if ($success) {
            return redirect()->route('users.show', $user)->with('success', 'Profil berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Profil gagal diupdate');
        }
    }

    public function destroy(User $user) {
        if ($user->id == auth()->user()->id) {
            return redirect()->route('users.index')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
