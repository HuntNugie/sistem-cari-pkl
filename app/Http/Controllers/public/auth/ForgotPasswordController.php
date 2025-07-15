<?php

namespace App\Http\Controllers\public\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifEmail;

class ForgotPasswordController extends Controller
{
    // halaman email forgot password user
    public function show(){
       
        return view("public.auth.verfEmail-forgot");
    }

    // aksi email forgot password user
    public function cekEmail(Request $request){
        $request->validate([
            "email"=> "required|email"
        ],[
            "email.required"=> "Email wajib diisi",
            "email.email"=> "Email tidak valid"
        ]);
        $email = $request->email;
        if(!User::where("email", $email)->exists()){
            return back()->with("gagal","Email tidak terdaftar");
        }
        $user = User::where("email", $email)->first();
        $otp = random_int(100000, 999999);
        $user->otp = $otp;
        $user->save();
        Mail::to($email)->send(new verifEmail($otp));
        session()->put("email", $email);
        session()->put("email_verified",true);
        session()->put("email_expired_at",now());
        return redirect()->route("public.otp.forgot")->with(["sukses" => "Berhasil mengirimkan kode otp ke $email silahkan cek email anda"]);
    }

    public function showOtp(){
        return view("public.auth.otp-forgot");
    }

    public function showReset(){
        return view("public.auth.reset-forgot");
    }
}
