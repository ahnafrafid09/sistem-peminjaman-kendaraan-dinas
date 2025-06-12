<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Storage;
use Validator;

class UserController extends Controller
{
    public function create()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        return view('admin.user.create', compact(['jurusan', 'prodi']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nik' => 'required|string|max:50|unique:users,nik',
            'no_telepon' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
            'jurusan_id' => 'required|exists:jurusan,id',
            'prodi_id' => 'required|exists:prodi,id',
            'foto_profil' => 'nullable|image|max:2048',
            'alamat' => 'nullable|string|max:255',
        ]);
        $fotoPath = null;
        if ($request->hasFile('foto_profil')) {
            $fotoName = time() . '_' . $request->file('foto_profil')->getClientOriginalName();
            $fotoPath = $request->file('foto_profil')->storeAs('foto_profil', $fotoName, 'public');
        }

        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'nik' => $validated['nik'],
            'no_telepon' => $validated['no_telepon'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'jurusan_id' => $validated['jurusan_id'],
            'prodi_id' => $validated['prodi_id'],
            'foto_profil' => $fotoPath,
            'alamat' => $validated['alamat'] ?? null,
        ]);

        return back()->with('success', 'User Berhasil Ditambahkan');
    }

    public function edit(string $id)
    {
        $user = User::with(['jurusan', 'prodi'])->findOrFail($id);
        // dd($user);
        $jurusan = Jurusan::all();
        $prodi = prodi::all();
        return view('admin.user.edit', compact(['user', 'jurusan', 'prodi']));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nik' => 'required|string|max:50|unique:users,nik,' . $user->id,
            'no_telepon' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string',
            'jurusan_id' => 'required|exists:jurusan,id',
            'prodi_id' => 'required|exists:prodi,id',
            'foto_profil' => 'nullable|image|max:2048',
            'alamat' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }
            $fotoName = time() . '_' . $request->file('foto_profil')->getClientOriginalName();
            $fotoPath = $request->file('foto_profil')->storeAs('foto_profil', $fotoName, 'public');
            $user->foto_profil = $fotoPath;
        }

        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->nik = $validated['nik'];
        $user->no_telepon = $validated['no_telepon'];
        $user->role = $validated['role'];
        $user->jurusan_id = $validated['jurusan_id'];
        $user->prodi_id = $validated['prodi_id'];
        $user->alamat = $validated['alamat'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('success', 'User berhasil diperbarui.');
    }



}
