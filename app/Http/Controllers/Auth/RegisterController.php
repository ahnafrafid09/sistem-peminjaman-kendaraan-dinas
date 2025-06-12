<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Prodi;

class RegisterController extends Controller
{
    /**
     * Tampilkan form registrasi.
     */
    public function showRegisterForm()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        return view('auth.register', compact('jurusan', 'prodi'));
    }

    /**
     * Simpan data registrasi ke database.
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username'     => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'jurusan_id'   => 'required|exists:jurusan,id',
            'prodi_id'     => 'required|exists:prodi,id',
            'no_telepon'   => 'required|string|max:20',
            'nik'          => 'required|string|max:20',
            'alamat'       => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan user
        User::create([
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'jurusan_id' => $request->jurusan_id,
            'prodi_id'   => $request->prodi_id,
            'no_telepon' => $request->no_telepon,
            'status'     => 'aktif', // default langsung aktif
            'nik'        => $request->nik,
            'alamat'     => $request->alamat,
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
