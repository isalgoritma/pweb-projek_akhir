<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LostItem;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function users()
    {
        $users = User::where('role', '!=', 'admin')->get(); // biar admin tidak mematikan admin sendiri
        return view('admin.users', compact('users'));
    }

    public function nonaktifkan($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => false]);

        return back()->with('success', 'User berhasil dinonaktifkan.');
    }

    public function items()
    {
        // kamu pakai 1 tabel lost_items
        $lostItems  = LostItem::where('type', 'lost')->latest()->get();
        $foundItems = LostItem::where('type', 'found')->latest()->get();

        return view('admin.items', compact('lostItems', 'foundItems'));
    }

    public function profile()
    {
        return view('admin.profiladmin');
    }
}
