<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalMobil = Mobil::count();
        $activePeminjaman = Peminjaman::where('status', 'Disetujui')->count();
        $pendingPengembalian = Pengembalian::whereDoesntHave('peminjaman', function($query) {
            $query->where('status', 'Selesai');
        })->count();

        $recentPeminjaman = Peminjaman::with(['user', 'mobil'])
            ->latest()
            ->take(5)
            ->get();

        $recentPengembalian = Pengembalian::with('peminjaman')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.admin', compact(
            'totalUsers',
            'totalMobil',
            'activePeminjaman',
            'pendingPengembalian',
            'recentPeminjaman',
            'recentPengembalian'
        ));
    }

    public function manageUsers()
    {
        $users = User::with(['jurusan', 'prodi'])->get();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        return view('admin.users.create', compact('jurusan', 'prodi'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:super_admin,kepala_unit,pegawai',
            'jurusan_id' => 'required|exists:jurusan,id',
            'prodi_id' => 'nullable|exists:prodi,id',
            'no_telepon' => 'required|string|max:15',
            'nik' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('foto_profil')) {
            $validated['foto_profil'] = $request->file('foto_profil')->store('profile-photos', 'public');
        }

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Similar methods for edit, update, delete users
}