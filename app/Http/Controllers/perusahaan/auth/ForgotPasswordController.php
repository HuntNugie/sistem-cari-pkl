<?php

namespace App\Http\Controllers\perusahaan\auth;

use App\Http\Controllers\Controller;
use App\Mail\verifEmail;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // halaman verif email forgot password
    public function show(){
        return view("perusahaan.auth.verifEmail-forgot");
    }

    // aksi verif email forgot password
    public function cekEmail(Request $request){
        $request->validate([
            "email" => "required|email"
        ],[
            "email.required" => "Email wajib diisi",
            "email.email" => "Format email salah"
        ]);
        if(!Perusahaan::where("email", $request->email)->exists()){
            return back()->with("gagal","Email tidak terdaftar");
        }
        $email = $request->email;
        $perusahaan = Perusahaan::where("email",$email)->first();
      
        $otp = random_int(100000, 999999);
        $perusahaan->otp = $otp;
        $perusahaan->save();
        Mail::to($email)->send(new verifEmail($otp));
        session()->put("email", $email);
        session()->put("email_verified",true);
        session()->put("email_expired_at",now());
        return redirect()->route("perusahaan.otp.forgot")->with(["sukses" => "Berhasil mengirimkan kode otp ke $email silahkan cek email anda"]);
    }

    // halaman otp forgot password
    public function showOtp(){
        return view("perusahaan.auth.otp-forgot");
    }

    // aksi halaman otp forgot password

    // halaman reset password
    public function showReset(){
        return view("perusahaan.auth.reset-forgot");
    }

    // aksi halaman reset password

    // resend otp
    
}
