<?php

namespace App\Http\Controllers\KepalaUnit;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $totalPengembalian = Pengembalian::where('status', 'Diproses')->count();
        $listPengembalian = Pengembalian::with('peminjaman', 'peminjaman.mobil.merek', 'peminjaman.mobil')->where('status', 'Diproses')->get();
        // dd($listPengembalian);
        return view('kepala_unit.pengembalian.index', compact(['listPengembalian', 'totalPengembalian']));
    }

    public function approval(string $id)
    {
        $pengembalian = Pengembalian::with('peminjaman', 'peminjaman.user', 'lokasiPengembalian', 'peminjaman.mobil.merek', 'peminjaman.mobil')->findOrFail($id);
        // dd($peminjaman);
        return view('kepala_unit.pengembalian.approval', compact('pengembalian'));
    }

    // public function getPengembalianByUser(string $userId)
    // {
    //     $peminjaman = Peminjaman::where('user_id', $userId)->latest()->first(); // Atau all()
    //     return response()->json($peminjaman);
    // }

    public function approve(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'catatan_pengembalian' => 'nullable|string'
        ]);

        $pengembalian = Pengembalian::with('peminjaman')->findOrFail($id);

        $pengembalian->update([
            'status' => $request->status,
            'catatan_pengembalian' => $request->catatan_pengembalian
        ]);

        if ($request->status === 'Disetujui') {
            Mobil::find($pengembalian->peminjaman->mobil_id)?->update(['status_ketersediaan' => 'Tersedia']);
            Peminjaman::find($pengembalian->peminjaman->id)?->update(['status' => "Selesai"]);
        }

        return redirect()->route('kepala-unit.pengembalian.index')
            ->with('success', 'Status pengembalian berhasil diperbarui');
    }
}
