<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $jumlahLokasi = Lokasi::all()->count();
        $listLokasi = Lokasi::all();
        return view('admin.lokasi.index', compact(['jumlahLokasi', 'listLokasi']));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|unique:lokasi|max:100'
        ]);

        Lokasi::create($request->all());
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $request->validate([
            'lokasi' => 'required|max:100|unique:lokasi,lokasi,' . $lokasi->id
        ]);

        $lokasi->lokasi = $request->lokasi;
        $lokasi->save();

        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil dihapus');
    }
}
