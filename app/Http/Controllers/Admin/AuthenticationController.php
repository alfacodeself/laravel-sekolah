<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('apps.admin.auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);
        try {
            if (!auth()->attempt($credentials)) {
                return back()->with(['error' => 'Login gagal, Silakan periksa username dan password anda.']);
            }
            return redirect()->route('admin.dashboard')->with('success', 'Log in Berhasil!');
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()]);
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil Logout!');
    }
}
