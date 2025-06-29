<?php

namespace App\Http\Controllers\public\auth;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function show(){
        return view("public.auth.login");
    }
    public function login(Request $request){
        $request->validate([
            "email" => "required | email | exists:users",
            "password" => "required"
        ],[
            "email.required" => "gagal login Email anda wajib di isi",
            "email.email" => "Gagal login yang anda masukkan bukan email",
            "email.exists" => "Gagal login email yang anda masukkan belum pernah terdaftar",
            "password.required" => "Gagal login anda wajib menambahkan password"
        ]);
        $remember = $request->filled("remember");

        $creadential = $request->only("email","password");
        if(Auth::attempt($creadential,$remember)){
            return redirect()->intended(route("beranda"));
        }

        return redirect()->back()->withErrors(["gagal" => "gagal login email atau password salah"]);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
    }
    public function handleGoogleCallback()
    {
        $userGoogle = Socialite::driver('google')->stateless()->user();
        $userManual = User::where("email",$userGoogle->getEmail())->first();
        if($userManual && !$userManual->google_id){
        //    jika pengguna sudah daftar dengan manual maka harus login manual
            return redirect()->route("public.login")->withErrors(["gagal" => "Anda sudah terdaftar dengan akun manual silahkan login manual"]);
        }

        // Lakukan proses login atau registrasi pengguna di sini
        $user = User::updateOrCreate([
            "email" => $userGoogle->getEmail(),
        ], [
            "name" => $userGoogle->getName(),
            "google_id" => $userGoogle->getId(),
            "avatar" => $userGoogle->getAvatar(),
            "password" => bcrypt(uniqid()), // Buat password acak untuk pengguna
            "email_verified_at" => now(), // Tandai email sebagai terverifikasi
        ]);

        if(UserProfile::where("user_id",$user->id)->doesntExist()){
            UserProfile::create([
                "user_id" => $user->id,
            ]);
        }
        Auth::login($user);
        return redirect()->route('beranda');
    }
}
