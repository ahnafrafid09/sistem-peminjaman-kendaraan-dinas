<?php

namespace App\Http\Controllers\KepalaUnit;

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
        $kepalaUnitId = Auth::id();

        $totalPeminjaman = Peminjaman::where('kepala_unit_id', $kepalaUnitId)->count();
        $totalPengembalian = Pengembalian::whereHas('peminjaman', function ($query) use ($kepalaUnitId) {
            $query->where('kepala_unit_id', $kepalaUnitId);
        })->count();

        $listPeminjaman = Peminjaman::with('user')->where('kepala_unit_id', $kepalaUnitId)->get();


        return view('kepala_unit.aktivitas.index', compact('totalPeminjaman', 'totalPengembalian', 'listPeminjaman'));
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

        if ($peminjaman->kepala_unit_id !== Auth::id()) {
            return redirect()->route('kepala-unit.aktivitas.index')
                ->with('error', 'Anda tidak memiliki izin untuk melihat data ini.');
        }

        return view('kepala_unit.aktivitas.detail', compact('peminjaman'));
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
