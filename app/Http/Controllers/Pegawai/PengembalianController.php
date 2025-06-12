<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(string $id)
    {
        $peminjaman = Peminjaman::with('mobil', 'mobil.merek')->findOrFail($id);
        $lokasi = Lokasi::all();
        return view('pegawai.pengembalian.create', compact(['peminjaman', 'lokasi']));
    }

    public function show(string $id)
    {
        $pengembalian = Pengembalian::with('lokasiPengembalian', 'peminjaman.mobil.merek', 'peminjaman.mobil', 'peminjaman')->findOrFail($id);

        return view('pegawai.pengembalian.show', compact('pengembalian'));
    }
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi_sesudah' => 'required|in:Baik,Rusak,Perlu Diservice',
        ]);
        $peminjaman = Peminjaman::findOrFail($id);

        $pengembalian = new Pengembalian();
        $pengembalian->peminjaman_id = $peminjaman->id;
        $pengembalian->lokasi_id = $validated['lokasi_id'];
        $pengembalian->kondisi_sesudah = $validated['kondisi_sesudah'];
        $pengembalian->save();

        $mobilId = $peminjaman->mobil_id;

        Mobil::where('id', $mobilId)->update([
            'status_kondisi' => $validated['kondisi_sesudah'],
            'lokasi_id'->$validated['lokasi_id']
        ]);


        return redirect()->route('pegawai.dashboard.index')->with('success', 'Pengembalian berhasil disimpan.');
    }

}
