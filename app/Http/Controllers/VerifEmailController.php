<?php

namespace App\Http\Controllers;

use App\Mail\verifEmail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class VerifEmailController extends Controller
{
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
        ],[
            "eamil.required" => "Email wajib di isi",
            "email.email" => "yang anda inputkan bukan lah sebuah email",
            "email.unique" => "Email sudah di pakai oleh user lain"
        ]);
// bikin generate otp
        $otp = random_int(100000, 999999);

// resend email
        if(session()->has("user_id")){
            if($this->resendOtp($request->email,$otp)){
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
    public function resendOtp($email,$otp){
            $id = session("user_id");
            $user = User::findOrFail($id);
            $user->email = $email;
            $user->otp = $otp;
            $user->save();
            Mail::to($email)->send(new verifEmail($otp));
            session()->put("email_expired_at",now());
            return true;
    }
}
