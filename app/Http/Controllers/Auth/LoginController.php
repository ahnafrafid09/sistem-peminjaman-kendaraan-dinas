<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return ('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha_input'  => 'required',
        ]);

        if ($request->captcha_input != session('captcha')) {
            return back()->withErrors(['captcha_input' => 'CAPTCHA salah, coba lagi.']);
        }

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // arahkan setelah login sukses
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $captcha = rand(10000, 99999); // Generate angka random 5 digit
        session(['captcha' => $captcha]); // Simpan ke session

        return view('auth.login', compact('captcha'));
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha_input' => 'required',
        ]);

        if ($request->captcha_input != session('captcha')) {
            return back()->withErrors(['captcha_input' => 'CAPTCHA salah, coba lagi.']);
        }

        // Lanjutkan proses login user di sini
    }

}

