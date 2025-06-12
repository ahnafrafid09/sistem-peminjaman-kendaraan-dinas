<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $jumlahProdi = Prodi::all()->count();
        $listProdi = Prodi::with('jurusan')->get();
        return view('admin.prodi.index', compact(['jumlahProdi', 'listProdi']));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.prodi.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:prodi|max:100',
            'jurusan_id' => 'required|exists:jurusan,id',
        ]);

        Prodi::create($request->all());
        return redirect()->route('admin.prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $prodi = Prodi::with('jurusan')->findOrFail($id);
        $jurusan = Jurusan::all();
        return view('admin.prodi.edit', compact(['prodi', 'jurusan']));
    }

    public function update(Request $request, string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $request->validate([
            'nama_prodi' => 'required|max:100|unique:prodi,nama_prodi,' . $prodi->id,
            'jurusan_id' => 'required|exists:jurusan,id',
        ]);

        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->jurusan_id = $request->jurusan_id;
        $prodi->save();

        return redirect()->route('admin.prodi.index')->with('success', 'Prodi berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('admin.prodi.index')->with('success', 'Prodi berhasil dihapus');
    }
}
