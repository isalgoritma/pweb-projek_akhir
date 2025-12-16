<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->orderBy('id')->get();
        return view('admin.users', compact('users'));
    }

    public function toggle(User $user)
    {
        if ($user->role === 'admin') abort(403);

        $user->update(['is_active' => !$user->is_active]);

        return back()->with('success', 'Status user diperbarui');
    }

    public function resetPassword(User $user)
    {
        if ($user->role === 'admin') {
            abort(403);
        }

        $newPassword = Str::random(8);

        $user->update([
            'password' => Hash::make($newPassword)
        ]);

        return back()->with('success',
            "Password user {$user->username} berhasil direset.
            Password sementara: {$newPassword}"
        );
    }
}

