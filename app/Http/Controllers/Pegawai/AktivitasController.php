<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Auth;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $totalPeminjaman = Peminjaman::where('user_id', $userId)->count();
        $totalPengembalian = Pengembalian::whereHas('peminjaman', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $listPeminjaman = Peminjaman::with('user')->where('user_id', $userId)->get();



        return view('pegawai.aktivitas.index', compact('totalPeminjaman', 'totalPengembalian', 'listPeminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::with('user', 'lokasiPeminjaman', 'pengembalian')->findOrFail($id);

        if ($peminjaman->user_id !== Auth::id()) {
            return redirect()->route('pegawai.aktivitas.index')
                ->with('error', 'Anda tidak memiliki izin untuk melihat data ini.');
        }


        return view('pegawai.aktivitas.detail', compact('peminjaman'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
