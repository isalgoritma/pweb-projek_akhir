<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        return view('admin.dashboard', compact('categories'));
    }

}
