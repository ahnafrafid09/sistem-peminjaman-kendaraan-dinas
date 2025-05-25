<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;       
use App\Models\Jurusan;    
use App\Models\Prodi;      
class UserController extends Controller
{
    public function create()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        return view('admin.register', compact('jurusan', 'prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:dosen,kepala_unit',
            'id_jurusan' => 'required|exists:jurusan,id',
            'id_prodi' => 'required|exists:prodi,id',
            'no_telp' => 'nullable',
            'nik' => 'nullable',
            'alamat' => 'nullable',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('password', 'foto_profil');
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('foto_profil')) {
            $data['foto_profil'] = $request->file('foto_profil')->store('profil', 'public');
        }

        User::create($data);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }
}
