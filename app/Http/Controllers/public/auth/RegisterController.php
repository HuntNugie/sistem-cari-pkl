<?php

namespace App\Http\Controllers\public\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        $id = session("user_id");
        $user = User::findOrFail($id);
        return view("public.auth.register",["email" => $user->email]);
    }
    public function register(Request $request){
        // validasi inputan form register
        $request->validate([
            "name" => "required|string",
            "password" => "required",
            "password_confirmation" => "required"
        ]);
        // cek apakah password dan konfirmasi password sama
        if($request->password !== $request->password_confirmation){
            return redirect()->back()->withErrors(["gagal" => "konfirmasi password tidak sama dengan password"]);
        }
        // Menangkap session dari user_id
        $id = session("user_id");
        // mencari user berdasarkan id yang ada di session
       $user = User::findOrFail($id);
    //    update user dengan data yang ada di form register
       $user->update([
        "name" => $request->name,
        "password" => Hash::make($request->password)
       ]);
    //    mengisi untuk table user_profiles
       $user->user_profile()->create([
        "user_id" => $user->id,
       ]);
    //    user langsung login setelah register
        Auth::login($user);
        $request->session()->forget([
            "verifEmail","email_expired_at","user_id"
        ]);
        return redirect()->route("beranda");
    }
}
