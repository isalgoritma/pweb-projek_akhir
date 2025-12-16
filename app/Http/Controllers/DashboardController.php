<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $categories = [
            'Elektronik',
            'Kendaraan',
            'Aksesoris',
            'Dokumen',
            'Lainnya'
        ];

        $categories = collect($categories)->map(function ($cat) {
            return [
                'name' => $cat,
                'slug' => Str::slug($cat),
            ];
        });

        return view('dashboard', compact('user', 'categories'));
    }
}
