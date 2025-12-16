<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    public function create(LostItem $item)
    {
        return view('verification.create', compact('item'));
    }

    // SIMPAN VERIFIKASI
    public function store(Request $request, LostItem $item)
    {
        $request->validate([
            'keterangan_kriteria' => 'required|min:5',
        ]);

        Verification::create([
            'user_id' => Auth::id(),
            'lost_item_id' => $item->id,
            'keterangan_kriteria' => $request->keterangan_kriteria,
            'status' => 'pending',
        ]);

        return redirect()
        ->route('criteria.index')
        ->with('success', 'Kriteria berhasil dikirim. Menunggu persetujuan.');
    }
}


