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
use App\Http\Controllers\admin\myprofileAdminController;
use App\Http\Controllers\perusahaan\auth\LoginPerusahaanController;
use App\Http\Controllers\perusahaan\auth\RegisterPerusahaanController;
use App\Http\Controllers\perusahaan\PerusahaanController;
use App\Models\Jurusan;
use App\Models\Perusahaan;

// landing page
Route::get('/', function () {
    return view('public.index');
})->name("beranda");

// daftar pkl
Route::middleware("auth")->prefix("daftar-pkl")->group(function(){
    // daftar seluruh pkl
    Route::get("/",function(){
        return view("public.daftar-pkl");
    })->name("public.daftar.pkl");

    // detail pkl
    Route::get("/detail",function(){
        return view("public.detail-pkl");
    })->name("public.detail.pkl")->middleware("jagaDaftar");
});

// login user
Route::get("/login",[LoginController::class,"show"])->name("public.login")->middleware("cekAuth");
Route::post("/login",[LoginController::class,"login"])->name("public.login.aksi");
Route::post("/logout",function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route("beranda");
})->name("public.logout");

// login with google
Route::get("/auth/google", [LoginController::class, "redirectToGoogle"])->name("public.auth.google");
Route::get("/auth/google/callback", [LoginController::class, "handleGoogleCallback"])->name("public.auth.google.callback");

// register user
Route::prefix("register")->group(function(){
    // memasukkan email dan kirim kode otp lewat email
    Route::get("/verifikasi-email",[VerifEmailController::class,"show"])->name("public.verifEmail")->middleware("cekAuth");
    Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasi"])->name("public.verifEmail.aksi")->middleware("gagalEmail");

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
    Route::put("/update/{siswa}",[MyProfileController::class,"update"])->name("public.myprofile.update")->middleware("auth");
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
    Route::get("/dashboard",[AdminController::class,"dashboard"])->name("admin.dashboard")->middleware(["auth:admin"]);

    // daftar siswa aktif
    Route::get("/siswa-aktif",[AdminController::class,"siswaAktif"])->name("admin.siswa.aktif")->middleware(["auth:admin"]);

    // daftar siswa pkl
    Route::get("/siswa-pkl",[AdminController::class,"siswaPkl"])->name("admin.siswa.pkl")->middleware(["auth:admin"]);

    // daftar perusahaan terkonfirmasi
    Route::get("/perusahaan-terkonfirmasi",[AdminController::class,"perkonf"])->name("admin.perusahaan.terkonfirmasi")->middleware(["auth:admin"]);

    // daftar perusahaan belum terkonfirmasi
    Route::get("/perusahaan-belum-terkonfirmasi",[AdminController::class,"pernonf"])->name("admin.perusahaan.belum.terkonfirmasi")->middleware(["auth:admin"]);

    // daftar admin
    Route::get("/daftar-admin",[AdminController::class,"daftarAdmin"])->name("admin.daftar.admin")->middleware(["auth:admin"]);

    // tambah admin
    Route::get("/tambah-admin",[AdminController::class,"tambahAdmin"])->name("admin.tambah.admin")->middleware(["auth:admin"]);

    // kritik dan saran
    Route::get("/kritik-saran",[AdminController::class,"kritikSaran"])->name("admin.kritik.saran")->middleware(["auth:admin"]);

    // halaman my profile admin
    Route::prefix("myprofile")->group(function(){
        Route::get("/",[myprofileAdminController::class,"show"])->name("admin.myprofile")->middleware("auth:admin");
        Route::get("/edit",[myprofileAdminController::class,"edit"])->name("admin.myprofile.edit")->middleware("auth:admin");
        Route::put("/update/{admin:username}",[myprofileAdminController::class,"update"])->name("admin.myprofile.update")->middleware("auth:admin");
    });
});

// Perusahaan route
Route::prefix("perusahaan")->group(function(){
    //login perusahaan
    Route::get("/login",[LoginPerusahaanController::class,"show"])->name("perusahaan.login")->middleware("cekAuth:perusahaan");
    Route::post("/login",[LoginPerusahaanController::class,"login"])->name("perusahaan.login.aksi");

    // verifikasi email perusahaan
    Route::get("/verifikasi-email",[VerifEmailController::class,"showPerusahaan"])->name("perusahaan.verifEmail")->middleware("cekAuth:perusahaan");
    Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasiPerusahaan"])->name("perusahaan.verifEmail.aksi")->middleware("gagalEmail");

    // verifikasi otp email perusahaan
    Route::get("/otp",[VerifOtpController::class,"otpPerusahaan"])->name("perusahaan.otp")->middleware(["cekAuth:perusahaan","jagaOtp"]);
    Route::post("/otp",[VerifOtpController::class,"verifOtpPerusahaan"])->name("perusahaan.otp.aksi");

    // register perusahaan
    Route::get("/register",[RegisterPerusahaanController::class,"show"])->name("perusahaan.register")->middleware(["cekAuth:perusahaan","jagaOtp"]);
    Route::post("/register",[RegisterPerusahaanController::class,"register"])->name("perusahaan.register.aksi");

    // perusahaan resend_otp
    Route::get("/kirim-ulang",function(){
         $otp = random_int(100000, 999999);
        $id = session("perusahaan_id");
        $perusahaan = Perusahaan::findOrFail($id);
        $email = $perusahaan->email;
        $perusahaan->otp = $otp;
        $perusahaan->save();
        Mail::to($email)->send(new verifEmail($otp));
        session()->put("email_expired_at",now());
        return redirect()->back()->with(["sukses" => "Berhasil mengirimkan kode otp ke $email silahkan cek email anda"]);
    })->name("perusahaan.resendOtp")->middleware(["jagaOtp","cekAuth"]);
    // logout perusahaan
    Route::post("/logout",function(Request $request){
        Auth::guard("perusahaan")->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route("perusahaan.login");
    })->name("perusahaan.logout");

    // dashboard perusahaan
    Route::get("/dashboard",[PerusahaanController::class,"dashboard"])->name("perusahaan.dashboard")->middleware(["auth:perusahaan"]);

    // daftar lowongan kerja
    Route::get("/daftar-lowongan",[PerusahaanController::class,"daftarLowongan"])->name("perusahaan.daftar.lowongan")->middleware(["auth:perusahaan","cekTerkonfirmasi"]);

    // daftar siswa baru
    Route::get("/daftar-siswa-baru",[PerusahaanController::class,"daftarSiswaBaru"])->name("perusahaan.daftar.siswa.baru")->middleware(["auth:perusahaan","cekTerkonfirmasi"]);

    // daftar siswa sedang pkl
    Route::get("/daftar-siswa-pkl",[PerusahaanController::class,"daftarSiswaPkl"])->name("perusahaan.daftar.siswa.pkl")->middleware(["auth:perusahaan","cekTerkonfirmasi"]);

    // daftar siswa sedang pkl
    Route::get("/daftar-siswa-riwayat",[PerusahaanController::class,"daftarRiwayat"])->name("perusahaan.daftar.riwayat")->middleware(["auth:perusahaan","cekTerkonfirmasi"]);

    // ajuan konfirmasi
    Route::get("/ajuan-konfirmasi",[PerusahaanController::class,"showAjuan"])->name("perusahaan.ajuan");
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
