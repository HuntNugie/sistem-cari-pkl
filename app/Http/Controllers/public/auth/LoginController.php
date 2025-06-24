<?php

namespace App\Http\Controllers\public\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view("public.auth.login");
    }
    public function login(Request $request){
        $request->validate([
            "email" => "required | email | exists:users",
            "password" => "required"
        ],[
            "email.required" => "gagal login Email anda wajib di isi",
            "email.email" => "Gagal login yang anda masukkan bukan email",
            "email.exists" => "Gagal login email yang anda masukkan belum pernah terdaftar",
            "password.required" => "Gagal login anda wajib menambahkan password"
        ]);
        $remember = $request->filled("remember");

        $creadential = $request->only("email","password");
        if(Auth::attempt($creadential,$remember)){
            return redirect()->intended(route("beranda"));
        }

        return redirect()->back()->withErrors(["gagal" => "gagal login email atau password salah"]);
    }
}
