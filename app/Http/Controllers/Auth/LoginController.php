<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            $request->session()->regenerate();
            switch (Auth::user()->role) {
                case 'super_admin':
                    return redirect()->route('admin.dashboard.index');
                case 'pegawai':
                    return redirect()->route('pegawai.dashboard.index');
                case 'kepala_unit':
                    return redirect()->route('kepala-unit.dashboard.index');
                default:
                    Auth::logout();
                    return back()
                        ->withErrors(['role' => 'Role tidak dikenali.']);
            }
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
