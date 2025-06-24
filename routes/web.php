<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifOtpController;
use App\Http\Controllers\VerifEmailController;
use App\Http\Controllers\public\auth\LoginController;
use App\Http\Controllers\public\auth\RegisterController;

Route::get('/', function () {
    return view('public.index');
})->name("beranda");
Route::get("/login",[LoginController::class,"show"])->name("public.login");
Route::post("/login",[LoginController::class,"login"])->name("public.login.aksi");
Route::post("/logout",function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route("beranda");
})->name("public.logout");
Route::prefix("register")->group(function(){
    Route::get("/verifEmail",[VerifEmailController::class,"show"])->name("public.verifEmail");
    Route::post("/verifEmail",[VerifEmailController::class,"verifikasi"])->name("public.verifEmail.aksi");
    Route::get("/otp",[VerifOtpController::class,"show"])->name("public.otp")->middleware("jagaOtp");
    Route::get("/register",[RegisterController::class,"show"])->name("public.register");
});
Route::get("/hapus",fn()=>User::truncate());
