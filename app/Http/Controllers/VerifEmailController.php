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
        return view("public.auth.verifEmail");
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
}
