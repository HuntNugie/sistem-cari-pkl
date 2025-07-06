<?php

namespace App\Http\Controllers\perusahaan\auth;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterPerusahaanController extends Controller
{
    public function show(){

        return view("perusahaan.auth.register");
    }
    public function register(Request $request){
        $request->validate([
            "password" => "required",
            "konfirmasi_password" => "required"
        ]);


        if($request->password !== $request->konfirmasi_password){
            return redirect()->back()->with("gagal","gagal registrasi passwrod dan konfirmasi password salah");
        }
        $perusahaan_profile = $request->validate([
            "nama_perusahaan" => "required | string",
            "pemilik" => "required | string",
        ]);
        $id = session()->get("perusahaan_id");
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update([
            "password" => Hash::make($request->password)
        ]);
        $perusahaan->perusahaanProfile()->create($perusahaan_profile);
        Auth::guard("perusahaan")->login($perusahaan);
           $request->session()->forget([
            "verifRegister","perusahaan_id"
        ]);
        return redirect()->intended(route("perusahaan.dashboard"));
    }
}
