<?php

namespace App\Http\Controllers;

use App\Mail\verifEmail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Mail;

class VerifEmailController extends Controller
{
    // menampilkan verifikasi email user
    public function show(){
        if(session()->has("user_id")){
            $id = session("user_id");
            $user = User::findOrFail($id);
        }
        return view("public.auth.verifEmail",["email" => $user->email ?? null]);
    }
    public function verifikasi(Request $request){
        $request->validate([
            "email" => "required | email | unique:users,email"
        ],params: [
            "email.required" => "Email wajib di isi",
            "email.email" => "yang anda inputkan bukan lah sebuah email",
            "email.unique" => "Email sudah di pakai oleh user lain"
        ]);
// bikin generate otp
        $otp = random_int(100000, 999999);


// kirim email
        if($request->has("email")){
        Mail::to($request->email)->send(new verifEmail($otp));
        session(["verifEmail" => true,"email_expired_at" => now()]);
        }

       $user =  User::create([
            "email" => $request->email,
            "otp" => $otp
        ]);
        session(["user_id" => $user->id]);
        return redirect()->intended(route("public.otp"));
    }
    // menampilkan halaman verifikasi email perusahaan
    public function showPerusahaan(){
        if(session()->has("perusahaan_id")){
            $id = session("perusahaan_id");
            $perusahaan = Perusahaan::findOrFail($id);
        }
        return view("perusahaan.auth.verifEmail",["email" => $perusahaan->email ?? ""]);

    }
    // menjalankan verifikasi email perusahaan
    public function verifikasiPerusahaan(Request $request){
        $request->validate([
            "email" => "required | email | unique:users,email"
        ],[
            "email.required" => "Email wajib di isi",
            "email.email" => "yang anda inputkan bukan lah sebuah email",
            "email.unique" => "Email sudah di pakai oleh user lain"
        ]);

        // bikin generate otp
        $otp = random_int(100000, 999999);
        // kirim email
        if($request->has("email")){
            // kirim email nya
            Mail::to($request->email)->send(new verifEmail($otp));
            session(["verifEmail" => true,"email_expired_at" => now()]);
        }
        // tambahkan email ke database
        $perusahaan = Perusahaan::create([
            "email" => $request->email,
            "otp" => $otp
        ]);
        session(["perusahaan_id" => $perusahaan->id]);
        return redirect()->intended(route("perusahaan.otp"));

    }
    // mengirim ulang otp
    public function resendOtpPerusahaan($email,$otp){
            $id = session("perusahaan_id");
            $perusahaan = Perusahaan::findOrFail($id);
            $perusahaan->email = $email;
            $perusahaan->otp = $otp;
            $perusahaan->save();
           $perusahaan->notify(new verifEmail($otp));
            session()->put("email_expired_at",now());
            return true;
    }

}
