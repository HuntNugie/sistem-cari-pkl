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
            "email" => "required | email"
        ], [
            "email.required" => "Email wajib di isi",
            "email.email" => "yang anda inputkan bukan lah sebuah email",
        ]);
        $otp = random_int(100000, 999999);
        $id = session("user_id");
        if(session()->has("user_id")){
            $user = User::where("id",$id)->first();
            $user->email = $request->email;
            Mail::to($user->email)->send(new verifEmail($otp));
                    $user->otp = $otp;
                    $user->save();
                    session(["verifEmail" => true,"email_expired_at" => now(),"user_id" => $user->id]);
                    return redirect()->intended(route("public.otp"));
        }

         if( $user = User::where("email", $request->email)->first()){
                if($user->password){
                    return redirect()->back()->with("gagal","akun anda telah terdaftar silahkan login");
                }else{
                    Mail::to($user->email)->send(new verifEmail($otp));
                    $user->otp = $otp;
                    $user->save();
                    session(["verifEmail" => true,"email_expired_at" => now(),"user_id" => $user->id]);
                    return redirect()->intended(route("public.otp"));
                }
           }


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
            "email" => "required | email"
        ],[
            "email.required" => "Email wajib di isi",
            "email.email" => "yang anda inputkan bukan lah sebuah email",
        ]);

        // bikin generate otp
        $otp = random_int(100000, 999999);
                $id = session("perusahaan_id");
        if(session()->has("perusahaan_id")){
            $perusahaan = Perusahaan::where("id",$id)->first();
            $perusahaan->email = $request->email;
            Mail::to($perusahaan->email)->send(new verifEmail($otp));
                    $perusahaan->otp = $otp;
                    $perusahaan->save();
                    session(["verifEmail" => true,"email_expired_at" => now(),"perusahaan_id" => $perusahaan->id]);
                    return redirect()->intended(route("perusahaan.otp"));
        }
         if( $perusahaan = Perusahaan::where("email", $request->email)->first()){
                if($perusahaan->password){
                    return redirect()->back()->with("gagal","akun anda telah terdaftar silahkan login");
                }else{
                    // jika gagal di ijinkan ke route otp dan akan mengirim ulang kode otp
                    Mail::to($perusahaan->email)->send(new verifEmail($otp));
                    $perusahaan->otp = $otp;
                    $perusahaan->save();
                    session(["verifEmail" => true,"email_expired_at" => now(),"perusahaan_id" => $perusahaan->id]);
                    return redirect()->intended(route("perusahaan.otp"))->with("sukses","silahkan cek email anda");
                }
            }
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
        return redirect()->intended(route("perusahaan.otp"))->with("sukses","silahkan cek email anda");

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
