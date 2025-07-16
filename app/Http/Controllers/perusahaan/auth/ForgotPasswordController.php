<?php

namespace App\Http\Controllers\perusahaan\auth;

use App\Mail\verifEmail;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
      
        // cek jika sebelumnya sudah berhasil login dengan mengecek password nya kosong atau tidak
        if($perusahaan->password == null){
            return back()->with("gagal","anda Sebelumnya belum selesai registrasi silahkan registrasi ulang");
        }
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
    public function cekOtp(Request $request){
        $request->validate([
            "otp" => "required|integer"
        ],[
            "otp.required" => "Otp wajib diisi",
            "otp.integer" => "Otp harus angka"
        ]);
        $waktu = session("email_expired_at");
        // jika waktu lebih dari 5 menit
        if(intval(now()->diffInMinutes(session("email_expired_at"))) < -5 ){
            return redirect()->back()->with("gagal","otp sudah expired silahkan pencet kirim ulang kode");
        }

        $email = session("email");
        $perusahaan = Perusahaan::where("email", $email)->first();
        if($perusahaan->otp != $request->otp){
            return back()->with("gagal","Otp tidak sesuai");
        }

        session()->forget("email_expired_at");

        session()->put("email_verified",true);
        session()->put("otp_verified",true);
        return redirect()->route("perusahaan.reset.password")->with(["sukses" => "Anda berhasil verifikasi email anda silahkan menambahkan password baru"]);    
    }
    // halaman reset password
    public function showReset(){
        return view("perusahaan.auth.reset-forgot");
    }

    // aksi halaman reset password
    public function reset(Request $request){
        $request->validate([
            "password" => "required | string | min:8",
            "konfirmasi_password" => "required | string | min:8"
        ],[
            "password.required" => "Password wajib diisi",
            "password.string" => "Password harus string",
            "password.min" => "Password minimal 8 karakter",
            "konfirmasi_password.required" => "Konfirmasi password wajib diisi",
            "konfirmasi_password.string" => "Konfirmasi password harus string",
            "konfirmasi_password.min" => "Konfirmasi password minimal 8 karakter"
        ]);
        if($request->password != $request->konfirmasi_password){
            return back()->with("gagal","password tidak sesuai");
        }
        $email = session("email");
        $perusahaan = Perusahaan::where("email", $email)->first();
        $perusahaan->password = Hash::make($request->password);
        $perusahaan->save();
        session()->forget("email");
        session()->forget("email_verified");
        session()->forget("otp_verified");
        return redirect()->route("perusahaan.login")->with(["sukses" => "Password berhasil diubah"]);
    }

    // resend otp
    public function resendOtp(){
        if(!session()->has("email")){
            return back()->with("gagal","anda tidak bisa mengirim ulang kode otp");
        }
        $email = session("email");
        $perusahaan = Perusahaan::where("email", $email)->first();
        $otp = random_int(100000, 999999);
        $perusahaan->otp = $otp;
        $perusahaan->save();
        Mail::to($email)->send(new verifEmail($otp));
        session()->put("email", $email);
        session()->put("email_verified",true);
        session()->put("email_expired_at",now());
        return redirect()->route("perusahaan.otp.forgot")->with(["sukses" => "Berhasil mengirimkan kode otp ke $email silahkan cek email anda"]);    
    }
}
