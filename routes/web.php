<?php

use App\Models\User;

use App\Models\Sekolah;
use App\Mail\verifEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifOtpController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\VerifEmailController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\public\auth\LoginController;
use App\Http\Controllers\public\auth\RegisterController;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\perusahaan\auth\LoginPerusahaanController;
use App\Http\Controllers\perusahaan\auth\RegisterPerusahaanController;

// landing page
Route::get('/', function () {
    return view('public.index');
})->name("beranda");

// login user
Route::get("/login",[LoginController::class,"show"])->name("public.login")->middleware("cekAuth");
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
    Route::get("/verifikasi-email",[VerifEmailController::class,"show"])->name("public.verifEmail")->middleware("cekAuth");
    Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasi"])->name("public.verifEmail.aksi");

    //memasukkan otp
    Route::get("/otp",[VerifOtpController::class,"show"])->name("public.otp")->middleware(["jagaOtp","cekAuth"]);
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
    session()->put("email_expired_at",now());
    return redirect()->back()->with(["sukses" => "Berhasil mengirimkan kode otp ke $email silahkan cek email anda"]);
    })->name("public.resend")->middleware(["jagaOtp","cekAuth"]);
    // memasukkan data diri
    Route::get("/isi-data",[RegisterController::class,"show"])->name("public.register")->middleware("cekAuth");
    Route::post("/isi-data",[RegisterController::class,"register"])->name("public.register.aksi");
});

// myprofile
Route::prefix("myprofile")->group(function(){
    Route::get("/profile",[MyProfileController::class,"show"])->name("public.myprofile")->middleware("auth");
    Route::get("/edit",[MyProfileController::class,"edit"])->name("public.myprofile.edit")->middleware("auth");
});


//Admin route
Route::prefix("admin")->group(function(){
    // auth
    Route::get("/login", [LoginAdminController::class,"show"])->name("admin.login")->middleware("cekAuth:admin");
    Route::post("/login", [LoginAdminController::class,"login"])->name("admin.login.aksi");
    Route::post("/logout",function(Request $request){
        Auth::guard("admin")->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route("admin.login");
    })->name("admin.logout");

    // dashboard
    Route::get("/dashboard",[AdminController::class,"index"])->name("admin.dashboard")->middleware(["auth:admin"]);
});

// Perusahaan route
Route::prefix("perusahaan")->group(function(){
    //login perusahaan
    Route::get("/login",[LoginPerusahaanController::class,"show"])->name("perusahaan.login")->middleware("cekAuth:perusahaan");
    Route::post("/login",[LoginPerusahaanController::class,"login"])->name("perusahaan.login.aksi");

    // register perusahaan
    Route::get("/register",[RegisterPerusahaanController::class,"show"])->name("perusahaan.register")->middleware("cekAuth:perusahaan");
    Route::post("/register",[RegisterPerusahaanController::class,"register"])->name("perusahaan.register.aksi");

    // logout perusahaan
    Route::post("/logout",function(Request $request){
        Auth::guard("perusahaan")->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route("perusahaan.login");
    })->name("perusahaan.logout");

    // dashboard perusahaan
    Route::get("/dashboard",function(){
        return view("perusahaan.dashboard");
    })->name("perusahaan.dashboard")->middleware("auth:perusahaan");

});



// Route::get("/hapus",function(){
//     User::truncate();
//     session()->invalidate();
//     return "berhasil";
// });

// Route::get("/apiSekolah",function(){
//     $response = Http::get("https://api-sekolah-indonesia.vercel.app/sekolah/SMK?page=1&perPage=1000");
//     $data = $response->json();
//     foreach ($data["dataSekolah"] as $item) {
//         Sekolah::create([
//             "nama_sekolah" => $item["sekolah"],
//             "npsn" => $item["npsn"],
//             "provinsi" => $item["propinsi"],
//             "alamat" => $item["kabupaten_kota"]." ".$item["kecamatan"]." ".$item["alamat_jalan"]
//         ]);
//     }
//     return view("tes",compact("data"));
// });
