<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MerekMobil;
use Illuminate\Http\Request;

class MerkMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kendaraan.merk-mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:merek_mobil|max:100'
        ]);

        MerekMobil::create($request->all());
        return redirect()->route('admin.kendaraan.index')->with('success', 'Merk Mobil berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merkMobil = MerekMobil::findOrFail($id);
        return view('admin.kendaraan.merk-mobil.edit', compact('merkMobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merkMobil = MerekMobil::findOrFail($id);
        $request->validate([
            'nama' => 'required|max:100|unique:merek_mobil,nama,' . $merkMobil->id
        ]);

        $merkMobil->nama = $request->nama;
        $merkMobil->save();

        return redirect()->route('admin.kendaraan.index')->with('success', 'Merk Mobil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merekMobil = MerekMobil::findOrFail($id);
        $merekMobil->delete();
        return redirect()->route('admin.kendaraan.index')->with('success', 'Merk Mobil berhasil dihapus');
    }
}
