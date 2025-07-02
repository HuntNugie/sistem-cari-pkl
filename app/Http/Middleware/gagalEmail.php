<?php

namespace App\Http\Middleware;

use Closure;
use App\Mail\verifEmail;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class gagalEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has("email")){
            // cek dulu apakah perusahaan seblumnya sudah berhasil mengisi data
           if( $perusahaan = Perusahaan::where("email", $request->email)->first()){
                if($perusahaan->password){
                    return redirect()->back()->with("gagal","akun anda telah terdaftar silahkan login");
                }else{
                    $otp = random_int(100000, 999999);
                    Mail::to($perusahaan->email)->send(new verifEmail($otp));
                    $perusahaan->otp = $otp;
                    $perusahaan->save();
                    session(["verifEmail" => true,"email_expired_at" => now(),"perusahaan_id" => $perusahaan->id]);
                    return redirect()->intended(route("perusahaan.otp"));
                }
           }
           if( $user = User::where("email", $request->email)->first()){
                if($user->password){
                    return redirect()->back()->with("gagal","akun anda telah terdaftar silahkan login");
                }else{
                    $otp = random_int(100000, 999999);
                    Mail::to($user->email)->send(new verifEmail($otp));
                    $perusahaan->otp = $otp;
                    $perusahaan->save();
                    session(["verifEmail" => true,"email_expired_at" => now(),"user_id" => $user->id]);
                    return redirect()->intended(route("public.otp"));
                }
           }

        }
        return $next($request);
    }
}
