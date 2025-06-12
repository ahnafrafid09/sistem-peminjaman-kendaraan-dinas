<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $listPeminjaman = Peminjaman::with('mobil', 'mobil.merek')->where('user_id', $userId)->get();
        $listPengembalian = Pengembalian::with('peminjaman', 'peminjaman.mobil', 'peminjaman.mobil.merek')->whereHas('peminjaman', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        $totalPeminjamanDiproses = Peminjaman::where('user_id', $userId)
            ->where('status', 'Diproses')
            ->count();

        $totalPeminjamanDitolak = Peminjaman::where('user_id', $userId)
            ->where('status', 'Ditolak')
            ->count();

        $totalPeminjamanDisetujui = Peminjaman::where('user_id', $userId)
            ->where('status', 'Disetujui')
            ->count();

        $totalPengembalianDiproses = Pengembalian::whereHas('peminjaman', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->where('status', 'Diproses')
            ->count();

        $totalPengembalianDisetujui = Pengembalian::whereHas('peminjaman', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->where('status', 'Disetujui')
            ->count();

        return view('pegawai.dashboard-pegawai', compact([
            'totalPeminjamanDiproses',
            'totalPeminjamanDitolak',
            'totalPeminjamanDisetujui',
            'totalPengembalianDiproses',
            'totalPengembalianDisetujui',
            'listPeminjaman',
            'listPengembalian'
        ]));
    }
}

