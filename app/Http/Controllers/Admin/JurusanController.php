<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Impor kelas Controller
use Illuminate\Http\Request; // Impor kelas Request
use App\Models\Jurusan; // Impor model Jurusan

class JurusanController extends Controller
{
    public function index()
    {
        $jumlahJurusan = Jurusan::all()->count();
        $listJurusan = Jurusan::all();
        return view('admin.jurusan.index', compact(['jumlahJurusan', 'listJurusan']));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|unique:jurusan|max:100'
        ]);

        Jurusan::create($request->all());
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $request->validate([
            'nama_jurusan' => 'required|max:100|unique:jurusan,nama_jurusan,' . $jurusan->id
        ]);

        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}