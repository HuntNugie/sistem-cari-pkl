<?php

use App\Models\User;
use App\Mail\verifEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifOtpController;
use App\Http\Controllers\VerifEmailController;
use App\Http\Controllers\public\auth\LoginController;
use App\Http\Controllers\public\auth\RegisterController;

// landing page
Route::get('/', function () {
    return view('public.index');
})->name("beranda");

// login user
Route::get("/login",[LoginController::class,"show"])->name("public.login");
Route::post("/login",[LoginController::class,"login"])->name("public.login.aksi");
Route::post("/logout",function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route("beranda");
})->name("public.logout");

// register user
Route::prefix("register")->group(function(){
    // memasukkan email dan kirim kode otp lewat email
    Route::get("/verifEmail",[VerifEmailController::class,"show"])->name("public.verifEmail");
    Route::post("/verifEmail",[VerifEmailController::class,"verifikasi"])->name("public.verifEmail.aksi");

    //memasukkan otp
    Route::get("/otp",[VerifOtpController::class,"show"])->name("public.otp")->middleware("jagaOtp");
    Route::post("/otp",[VerifOtpController::class,"verifOtp"])->name("public.otp.aksi");

    // kirim ulang kode otp
    Route::get("/kirim-ulang",function(){
        $otp = random_int(100000, 999999);
        $id = session("user_id");
    $user = User::findOrFail($id);
    $email = $user->email;
    $user->otp = $otp;
    $user->save();
    Mail::to($email)->send(new verifEmail($otp));
    return redirect()->back()->with(["sukses" => "Berhasil mengirimkan kode otp ke $email silahkan cek email anda"]);
    })->name("public.resend")->middleware("jagaOtp");

    // memasukkan data diri
    Route::get("/register",[RegisterController::class,"show"])->name("public.register");
    Route::post("/register",[RegisterController::class,"register"])->name("public.register.aksi");
});


Route::get("/hapus",function(){
    User::truncate();
    session()->invalidate();
    return "berhasil";
});

