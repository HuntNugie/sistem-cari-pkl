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
            "email" => "required | email"
        ]);
// bikin generate otp
        $otp = random_int(100000, 999999);
// kirim email
        if($request->has("email")){
        Mail::to($request->email)->send(new verifEmail($otp));
        session(["verifEmail" => true]);
        }

       $user =  User::create([
            "email" => $request->email,
            "otp" => $otp
        ]);
        session(["user_id" => $user->id]);
        return redirect()->intended(route("public.otp"));
    }
}
