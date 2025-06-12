<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user();
        $role = $profile->role;
        switch ($role) {
            case 'super_admin':
                return view('admin.profile.index', compact('profile'));
            case 'pegawai':
                return view('pegawai.profile.index', compact('profile'));
            case 'kepala_unit':
                return view('kepala_unit.profile.index', compact('profile'));
            default:
                Auth::logout();
                return back()
                    ->withErrors(['role' => 'Role tidak dikenali.']);
        }
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
