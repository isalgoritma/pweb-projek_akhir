<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    public function index()
    {
        // Kriteria pending (untuk pemilik barang)
        $verifiedCriteria = Verification::where('status', 'pending')
            ->whereHas('lostItem', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->get();

        // Barang yang klaimnya disetujui (ikon WA)
        $approvedItems = Verification::where('status', 'approved')
            ->where('user_id', Auth::id())
            ->get();

        return view('profile.confirmations', compact(
            'verifiedCriteria',
            'approvedItems'
        ));
    }

    public function show(Verification $verification)
    {
        // keamanan: hanya owner barang atau admin
        if (
            Auth::id() !== $verification->lostItem->user_id &&
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        return view('criteria.show', compact('verification'));
    }

    // =============================
    // APPROVE (FINAL)
    // =============================
    public function approve(Verification $verification)
    {
        // update status verifikasi
        $verification->update([
            'status' => 'approved'
        ]);

        // update status barang
        $verification->lostItem->update([
            'status' => 'matched'
        ]);

        return redirect()
            ->route('criteria.index')
            ->with('success', 'Verifikasi disetujui');
    }

    // =============================
    // REJECT (FINAL)
    // =============================
    public function reject(Verification $verification)
    {
        $verification->update([
            'status' => 'rejected'
        ]);

        return redirect()
            ->route('criteria.index')
            ->with('success', 'Verifikasi ditolak');
    }
}
