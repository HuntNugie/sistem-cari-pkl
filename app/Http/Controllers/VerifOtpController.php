<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class VerifOtpController extends Controller
{
    public function show(){
        $id = session("user_id");
        $user = User::findOrFail($id);
        return view("public.auth.otp",["email" => $user->email]);
    }
    public function verifOtp(Request $request){
        $request->validate([
            "otp" => "required | numeric"
        ]);
        $id = $request->session()->get("user_id");
        $user = User::findOrFail($id);
        if(intval(now()->diffInMinutes(session("email_expired_at"))) < -5 ){
            $user->otp = null;
            $user->save();
            return back()->withErrors(["gagal"=> "tidak dapat mealnjutkan otp sudah expired klik kirim ulang otp"]);
        }

        if($user->otp === $request->otp){
            $user->email_verified_at = now();
            $user->save();
            $request->session()->forget("verifEmail");
            return redirect()->intended(route("public.register"));
        }
        return redirect()->back()->withErrors(["gagal" => "Kode otp yang anda masukkan tidak sesuai"]);

    }
}
