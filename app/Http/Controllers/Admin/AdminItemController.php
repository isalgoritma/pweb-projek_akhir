<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;

class AdminItemController extends Controller
{
    public function index()
    {
        $lostItems = Item::all();
        $foundItems = collect(); // kosong

        return view('admin.items', compact('lostItems', 'foundItems'));
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();

        return back()->with('success', 'Barang berhasil dihapus');
    }
}

