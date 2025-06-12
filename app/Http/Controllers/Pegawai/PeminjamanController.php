<?php

namespace App\Http\Controllers\Pegawai;

use App\Events\PeminjamanBaru;
use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $mobil = Mobil::with('lokasi', 'merek')->where('status_ketersediaan', "Tersedia")->get();
        return view('pegawai.peminjaman.create', compact('mobil'));
    }

    public function show(string $id)
    {
        $peminjaman = Peminjaman::with('lokasiPeminjaman', 'mobil.merek', 'mobil')->findOrFail($id);

        return view('pegawai.peminjaman.show', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'jam_peminjaman' => 'required',
            'jam_pengembalian' => 'required',
            'mobil_id' => 'required|exists:mobil,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'tujuan' => 'required|string|max:255',
            'kondisi_sebelum' => 'required|string|max:255',
            'kepemilikan_sim' => 'required|boolean',
            'alasan_peminjaman' => 'required|string|max:1000',
        ]);
        $kepalaUnit = User::where('role', 'kepala_unit')->inRandomOrder()->first();

        if (!$kepalaUnit) {
            return back()->with('error', 'Tidak ada kepala unit tersedia.');
        }
        Peminjaman::create([
            'user_id' => Auth::id(),
            'mobil_id' => $request->mobil_id,
            'lokasi_id' => $request->lokasi_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'jam_peminjaman' => $request->jam_peminjaman,
            'jam_pengembalian' => $request->jam_pengembalian,
            'tujuan' => $request->tujuan,
            'kondisi_sebelum' => $request->kondisi_sebelum,
            'kepemilikan_sim' => $request->has('kepemilikan_sim'),
            'alasan_peminjaman' => $request->alasan_peminjaman,
            'kepala_unit_id' => $kepalaUnit->id,
        ]);

        Mobil::where('id', $request->mobil_id)->update([
            'status_ketersediaan' => 'Dipinjam',
        ]);

        event(new PeminjamanBaru($kepalaUnit->id));

        return redirect()->route('pegawai.peminjaman.index')->with('success', 'Peminjaman Berhasil dibuat');
    }
}
