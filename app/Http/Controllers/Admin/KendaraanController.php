<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Lokasi;
use App\Models\MerekMobil;
use App\Models\Mobil;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahKendaraan = Mobil::all()->count();
        $listKendaraan = Mobil::with('merek', 'lokasi')->get();
        $listMerkMobil = MerekMobil::all();
        $jumlahMerkMobil = MerekMobil::all()->count();

        return view('admin.kendaraan.index', compact(['jumlahKendaraan', 'listKendaraan', 'listMerkMobil', 'jumlahMerkMobil']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listMerkMobil = MerekMobil::all();
        $listLokasi = Lokasi::all();
        $listJurusan = Jurusan::all();
        return view('admin.kendaraan.create', compact(['listMerkMobil', 'listLokasi', 'listJurusan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek_mobil_id' => 'required|exists:merek_mobil,id',
            'lokasi_awal' => 'required|exists:lokasi,id',
            'plat_nomor' => 'required|string|max:15|unique:mobil,plat_nomor',
            'tahun_pembuatan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'status_ketersediaan' => 'required|in:Tersedia,Dipinjam,Dalam Perbaikan',
            'kapasitas_penumpang' => 'required|integer|min:1',
            'jurusan_id' => 'required|exists:jurusan,id',
            'tanggal_servis_terakhir' => 'required|date'
        ]);

        Mobil::create($request->all());
        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kendaraan = Mobil::with('jurusan', 'lokasi', 'merek')->findOrFail($id);
        $listMerkMobil = MerekMobil::all();
        $listLokasi = Lokasi::all();
        $listJurusan = Jurusan::all();
        return view('admin.kendaraan.edit', compact(['kendaraan', 'listMerkMobil', 'listLokasi', 'listJurusan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kendaraan = Mobil::findOrFail($id);
        $request->validate([
            'merek_mobil_id' => 'required|exists:merek_mobil,id',
            'lokasi_awal' => 'required|exists:lokasi,id',
            'plat_nomor' => 'required|string|max:15|unique:mobil,plat_nomor,' . $kendaraan->id . ',id',
            'tahun_pembuatan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'status_ketersediaan' => 'required|in:Tersedia,Dipinjam,Dalam Perbaikan',
            'kapasitas_penumpang' => 'required|integer|min:1',
            'jurusan_id' => 'required|exists:jurusan,id',
            'tanggal_servis_terakhir' => 'required|date'
        ]);

        $kendaraan->update($request->all());
        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Mobil::findOrFail($id);
        $kendaraan->delete();
        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan berhasil dihapus');
    }
}
