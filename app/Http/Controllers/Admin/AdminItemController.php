<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LostItem;

class AdminItemController extends Controller
{
    public function index()
    {
        $lostItems  = LostItem::where('type', 'lost')->latest()->get();
        $foundItems = LostItem::where('type', 'found')->latest()->get();

        return view('admin.items', compact('lostItems','foundItems'));
    }

    public function destroy(LostItem $item)
    {
        $item->delete();
        return back()->with('success', 'Barang berhasil dihapus');
    }
}
