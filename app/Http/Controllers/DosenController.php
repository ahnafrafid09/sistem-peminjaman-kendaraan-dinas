<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        $totalPeminjaman = Peminjaman::where('user_id', $user->id)->count();
        $approvedPeminjaman = Peminjaman::where('user_id', $user->id)
            ->where('status', 'Disetujui')
            ->count();
        $pendingPeminjaman = Peminjaman::where('user_id', $user->id)
            ->where('status', 'Diproses')
            ->count();

        $activePeminjaman = Peminjaman::with('mobil')
            ->where('user_id', $user->id)
            ->where('status', 'Disetujui')
            ->whereNull('tanggal_pengembalian')
            ->get();

        // In a real app, you would fetch actual notifications
        $notifications = [
            (object)[
                'title' => 'Peminjaman Disetujui',
                'message' => 'Peminjaman mobil dengan plat B 1234 ABC telah disetujui',
                'created_at' => now()->subHours(2)
            ],
            (object)[
                'title' => 'Pengembalian Diterima',
                'message' => 'Pengembalian mobil dengan plat D 5678 XYZ telah diterima',
                'created_at' => now()->subDays(1)
            ]
        ];

        return view('dosen.dosen', compact(
            'totalPeminjaman',
            'approvedPeminjaman',
            'pendingPeminjaman',
            'activePeminjaman',
            'notifications'
        ));
    }

    public function listMobil()
    {
        $mobil = Mobil::with(['merek', 'lokasi'])
            ->where('status_ketersediaan', 'Tersedia')
            ->where('status_kondisi', 'Baik')
            ->get();

        return view('dosen.mobil.index', compact('mobil'));
    }

    public function createPeminjaman($mobilId)
    {
        $mobil = Mobil::findOrFail($mobilId);
        $lokasi = Lokasi::all();
        return view('dosen.peminjaman.create', compact('mobil', 'lokasi'));
    }

    public function storePeminjaman(Request $request)
    {
        $validated = $request->validate([
            'mobil_id' => 'required|exists:mobil,id',
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
            'jam_peminjaman' => 'required',
            'alasan_peminjaman' => 'required|string',
            'tujuan' => 'required|string',
            'lokasi_peminjaman' => 'required|exists:lokasi,id',
        ]);

        $mobil = Mobil::find($validated['mobil_id']);
        if (!$mobil->isAvailable()) {
            return back()->with('error', 'Mobil tidak tersedia untuk dipinjam.');
        }

        $validated['user_id'] = Auth::id();
        $validated['kepala_unit_id'] = $mobil->jurusan->users()
            ->where('role', 'kepala_unit')
            ->first()->id;
        $validated['kondisi_sebelum'] = $mobil->status_kondisi;
        $validated['status'] = 'Diproses';

        Peminjaman::create($validated);

        // Update mobil status
        $mobil->update(['status_ketersediaan' => 'Dipinjam']);

        return redirect()->route('dosen.peminjaman.index')
            ->with('success', 'Peminjaman berhasil diajukan.');
    }

    // Similar methods for pengembalian, riwayat, etc.
}