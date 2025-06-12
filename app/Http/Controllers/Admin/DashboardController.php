<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalUsers = User::count();
        $totalPegawai = User::where('role', 'pegawai')->count();
        $totalKepalaUnit = User::where('role', 'kepala_unit')->count();

        $search = $request->input('search');

        $listPegawai = User::where('role', 'pegawai')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%");
                });
            })
            ->get();

        $listKepalaUnit = User::where('role', 'kepala_unit')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%");
                });
            })
            ->get();



        return view('admin.dashboard-admin', compact(['totalUsers', 'totalPegawai', 'totalKepalaUnit', 'listPegawai', 'listKepalaUnit']));
    }
}