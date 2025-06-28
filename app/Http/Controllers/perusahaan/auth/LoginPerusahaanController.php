<?php

namespace App\Http\Controllers\perusahaan\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginPerusahaanController extends Controller
{
    public function show(Request $request)
    {
        return view('perusahaan.auth.login'); // Ganti dengan view login perusahaan
    }
    public function login(Request $request)
    {
        // Validasi dan autentikasi perusahaan
        $credentials = $request->validate([
            "email" => "required|email|exists:perusahaans,email",
            "password" => "required|string",
        ]);
        $remember = $request->filled("remember");
        if(Auth::guard("perusahaan")->attempt($credentials, $remember)){
            // Jika autentikasi berhasil, redirect ke dashboard perusahaan
            return redirect()->intended(route("perusahaan.dashboard"));
        }
    // Jika gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(["email" => "Email atau password salah"])->withInput();

        // Redirect atau tampilkan pesan sukses/gagal
    }
}
