<?php

namespace App\Http\Controllers\KepalaUnit;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalPeminjaman = Peminjaman::count();
        $totalPengembalian = Pengembalian::count();


        $search = $request->input('search');
        $listPeminjaman = Peminjaman::with('mobil.merek', 'mobil')->when($search, function ($query, $search) {
            $query->whereHas('mobil.merek', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        })->get();

        $listPengembalian = Pengembalian::with('peminjaman.user', 'peminjaman', 'peminjaman.mobil.merek')->when($search, function ($query, $search) {
            $query->whereHas('peminjaman.user', function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")->where('email', 'like', "%{$search}%");
            });
        })->get();

        return view('kepala_unit.dashboard-kepalaunit', compact(['totalPeminjaman', 'totalPengembalian', 'listPeminjaman', 'listPengembalian']));
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
        //
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
