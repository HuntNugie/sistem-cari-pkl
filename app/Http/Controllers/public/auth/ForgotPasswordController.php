<?php

namespace App\Http\Controllers\public\auth;

use App\Models\User;
use App\Mail\verifEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function cekOtp(Request $request) {
        $request->validate([
            "otp"=> "required | integer"
        ],[
            "otp.required"=> "Otp wajib diisi",
            "otp.integer"=> "Otp harus angka"
        ]);
        $waktu = session("email_expired_at");
        // jika waktu lebih dari 5 menit
        if(intval(now()->diffInMinutes(session("email_expired_at"))) < -5 ){
            return redirect()->back()->with("gagal","otp sudah expired silahkan pencet kirim ulang kode");
        }

        $email = session("email");
        $user = User::where("email", $email)->first();
        if($user->otp != $request->otp){
            return back()->with("gagal","Otp tidak sesuai");
        }

        session()->forget("email_expired_at");

        session()->put("email_verified",true);
        session()->put("otp_verified",true);
        return redirect()->route("public.reset.password")->with(["sukses" => "Anda berhasil verifikasi email anda silahkan menambahkan password baru"]);    
    }
    // halaman reset password user
    public function showReset(){
        return view("public.auth.reset-forgot");
    }

    // aksi untuk reset password baru
    public function updatePassword(Request $request){
        $request->validate([
            "password"=> "required",
            "password_confirmation"=> "required"
        ],[
            "password.required"=> "Password wajib diisi",
            "password_confirmation.required"=> "Konfirmasi password wajib diisi"
        ]);
        // jika password dan konfirmasi password tidak sama
        if($request->password !== $request->password_confirmation){
            return back()->with("gagal","Password tidak sesuai");
        }
        $email = session("email");
        $user = User::where("email", $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        session()->forget("email");
        session()->forget("email_verified");
        session()->forget("otp_verified");
        return redirect()->route("public.login")->with(["sukses" => "Anda berhasil mengubah password anda"]);
    }
    public function resendOtp(Request $request){
        if(!session()->has("email")){
            return redirect()->back()->with("gagal","anda tidak bisa mengirim ulang kode otp");
        }
        $email = session("email");
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
}
