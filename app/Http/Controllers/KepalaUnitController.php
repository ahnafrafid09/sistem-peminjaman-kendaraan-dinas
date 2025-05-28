<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepalaUnitController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        $totalMobil = Mobil::where('jurusan_id', $user->jurusan_id)->count();
        $availableMobil = Mobil::where('jurusan_id', $user->jurusan_id)
            ->where('status_ketersediaan', 'Tersedia')
            ->count();
        $pendingPeminjaman = Peminjaman::where('kepala_unit_id', $user->id)
            ->where('status', 'Diproses')
            ->count();
        $pendingPengembalian = Pengembalian::whereHas('peminjaman', function($query) use ($user) {
            $query->where('kepala_unit_id', $user->id)
                ->where('status', 'Disetujui');
        })->count();

        $pendingPeminjamanList = Peminjaman::with(['user', 'mobil'])
            ->where('kepala_unit_id', $user->id)
            ->where('status', 'Diproses')
            ->latest()
            ->take(5)
            ->get();

        $pendingPengembalianList = Pengembalian::with(['peminjaman.user', 'peminjaman.mobil'])
            ->whereHas('peminjaman', function($query) use ($user) {
                $query->where('kepala_unit_id', $user->id)
                    ->where('status', 'Disetujui');
            })
            ->latest()
            ->take(5)
            ->get();

        $mobilStatus = Mobil::with(['merek', 'lokasi'])
            ->where('jurusan_id', $user->jurusan_id)
            ->get();

        return view('kepalaunit.kepalaunit', compact(
            'totalMobil',
            'availableMobil',
            'pendingPeminjaman',
            'pendingPengembalian',
            'pendingPeminjamanList',
            'pendingPengembalianList',
            'mobilStatus'
        ));
    }

    public function approvePeminjaman(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        if ($peminjaman->kepala_unit_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'catatan_kepala_unit' => 'nullable|string',
        ]);

        $peminjaman->update($validated);

        if ($validated['status'] === 'Ditolak') {
            $peminjaman->mobil->update(['status_ketersediaan' => 'Tersedia']);
        }

        return back()->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    public function approvePengembalian(Request $request, $id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjaman = $pengembalian->peminjaman;
        
        if ($peminjaman->kepala_unit_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'kondisi_sesudah' => 'required|in:Baik,Perlu Service,Rusak',
        ]);

        $pengembalian->update($validated);
        
        // Update mobil status and condition
        $peminjaman->mobil->update([
            'status_ketersediaan' => 'Tersedia',
            'status_kondisi' => $validated['kondisi_sesudah']
        ]);

        // Mark peminjaman as completed
        $peminjaman->update(['status' => 'Selesai']);

        return back()->with('success', 'Pengembalian berhasil disetujui.');
    }

    // Similar methods for managing mobil, rekapitulasi, etc.
}