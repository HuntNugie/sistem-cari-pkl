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
use App\Http\Controllers\perusahaan\MyProfilePerusahaanController;
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

    // Route myprofile User
    Route::prefix("myprofile")->group(function(){

        // Halaman utama myprofile user
        Route::get("/profile",[MyProfileController::class,"show"])->name("public.myprofile")->middleware("auth");

        // Halaman Edit myprofile user
        Route::get("/edit",[MyProfileController::class,"edit"])->name("public.myprofile.edit")->middleware("auth");

        // Aksi Edit myprofile user
        Route::put("/update/{siswa}",[MyProfileController::class,"update"])->name("public.myprofile.update")->middleware("auth");
    });
});

// Halaman Logout
Route::post("/logout",function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route("beranda");
})->name("public.logout");

// Halaman yang jika sudah login user maka tidak dapat di akses
Route::middleware("cekAuth")->group(function(){

    //Halaman login user
    Route::get("/login",[LoginController::class,"show"])->name("public.login");

    // Aksi Login user
    Route::post("/login",[LoginController::class,"login"])->name("public.login.aksi");

    // login with google
    Route::get("/auth/google", [LoginController::class, "redirectToGoogle"])->name("public.auth.google");

    //redirect dari login with google
    Route::get("/auth/google/callback", [LoginController::class, "handleGoogleCallback"])->name("public.auth.google.callback");

    // register user
    Route::prefix("register")->group(function(){

        // memasukkan email dan kirim kode otp lewat email
        Route::get("/verifikasi-email",[VerifEmailController::class,"show"])->name("public.verifEmail");

        // aksi memasukkan email dan kirim kode opt lewat email
        Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasi"])->name("public.verifEmail.aksi")->middleware("gagalEmail");

        // route untuk mengjaga jika ada yang mengakses langsung ke halaman
       Route::middleware("jagaOtp")->group(function(){
            //memasukkan otp
            Route::get("/otp",[VerifOtpController::class,"show"])->name("public.otp");
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
            })->name("public.resend");
       });

        // memasukkan data diri
        Route::get("/isi-data",[RegisterController::class,"show"])->name("public.register");

        // aksi untuk memasukkan data diri
        Route::post("/isi-data",[RegisterController::class,"register"])->name("public.register.aksi");
    });
});




//Admin route
Route::prefix("admin")->group(function(){

    // Halaman Login Admin
    Route::get("/login", [LoginAdminController::class,"show"])->name("admin.login")->middleware("cekAuth:admin");

    // Aksi login admin
    Route::post("/login", [LoginAdminController::class,"login"])->name("admin.login.aksi");

    // Aksi Logout admin
    Route::post("/logout",function(Request $request){
        Auth::guard("admin")->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route("admin.login");
    })->name("admin.logout");

    // Route yang hanya yang sudah login admin yang dapat akses
    Route::middleware("auth:admin")->group(function(){
        // Halaman Dashboard admin
        Route::get("/dashboard",[AdminController::class,"dashboard"])->name("admin.dashboard");

        //Halaman daftar siswa aktif
        Route::get("/siswa-aktif",[AdminController::class,"siswaAktif"])->name("admin.siswa.aktif");

        //Halaman daftar siswa pkl
        Route::get("/siswa-pkl",[AdminController::class,"siswaPkl"])->name("admin.siswa.pkl");

        //Halaman daftar perusahaan terkonfirmasi
        Route::get("/perusahaan-terkonfirmasi",[AdminController::class,"perkonf"])->name("admin.perusahaan.terkonfirmasi");

        //Halaman daftar perusahaan belum terkonfirmasi
        Route::get("/perusahaan-belum-terkonfirmasi",[AdminController::class,"pernonf"])->name("admin.perusahaan.belum.terkonfirmasi");

        //Halaman daftar admin
        Route::get("/daftar-admin",[AdminController::class,"daftarAdmin"])->name("admin.daftar.admin");

        //Halaman tambah admin
        Route::get("/tambah-admin",[AdminController::class,"tambahAdmin"])->name("admin.tambah.admin");

        //Halamam kritik dan saran
        Route::get("/kritik-saran",[AdminController::class,"kritikSaran"])->name("admin.kritik.saran");

        // halaman my profile admin
        Route::prefix("myprofile")->group(function(){
            // Halaman utama myprofile
            Route::get("/",[myprofileAdminController::class,"show"])->name("admin.myprofile");

            // Halaman edit Myprofile
            Route::get("/edit",[myprofileAdminController::class,"edit"])->name("admin.myprofile.edit");

            // Aksi edit myprofile
            Route::put("/update/{admin:username}",[myprofileAdminController::class,"update"])->name("admin.myprofile.update");
        });
    });

});

// Perusahaan route
Route::prefix("perusahaan")->group(function(){

    Route::middleware("cekAuth:perusahaan")->group(function(){
        //Halaman login perusahaan
        Route::get("/login",[LoginPerusahaanController::class,"show"])->name("perusahaan.login");

        //aksi login perusahaan
        Route::post("/login",[LoginPerusahaanController::class,"login"])->name("perusahaan.login.aksi");

        //Halaman verifikasi email perusahaan
        Route::get("/verifikasi-email",[VerifEmailController::class,"showPerusahaan"])->name("perusahaan.verifEmail");

        //Aksi verifikasi email perusahaan
        Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasiPerusahaan"])->name("perusahaan.verifEmail.aksi")->middleware("gagalEmail");



        //Aksi verifikasi otp email perusahaan
        Route::post("/otp",[VerifOtpController::class,"verifOtpPerusahaan"])->name("perusahaan.otp.aksi");


        // Aksi register perusahaan
        Route::post("/register",[RegisterPerusahaanController::class,"register"])->name("perusahaan.register.aksi");

        // Route jika
        Route::middleware("jagaOtp")->group(function(){
            //Halaman verifikasi otp email perusahaan
            Route::get("/otp",[VerifOtpController::class,"otpPerusahaan"])->name("perusahaan.otp");

            //Halaman register perusahaan
            Route::get("/register",[RegisterPerusahaanController::class,"show"])->name("perusahaan.register");

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
            })->name("perusahaan.resendOtp");

        });

    });

    // logout perusahaan
    Route::post("/logout",function(Request $request){
        Auth::guard("perusahaan")->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route("perusahaan.login");
    })->name("perusahaan.logout");


    // route untuk auth perusahaan setelah login
   Route::middleware(['auth:perusahaan'])->group(function () {
        // dashboard perusahaan
        Route::get("/dashboard",[PerusahaanController::class,"dashboard"])->name("perusahaan.dashboard")->middleware(["auth:perusahaan"]);

        // route jika status di ijinkan terkonfirmasi
        Route::middleware(["cekTerkonfirmasi"])->group(function(){

            // daftar lowongan kerja
            Route::get("/daftar-lowongan",[PerusahaanController::class,"daftarLowongan"])->name("perusahaan.daftar.lowongan");

            // daftar siswa baru
            Route::get("/daftar-siswa-baru",[PerusahaanController::class,"daftarSiswaBaru"])->name("perusahaan.daftar.siswa.baru");

            // daftar siswa sedang pkl
            Route::get("/daftar-siswa-pkl",[PerusahaanController::class,"daftarSiswaPkl"])->name("perusahaan.daftar.siswa.pkl");

            // daftar siswa sedang pkl
            Route::get("/daftar-siswa-riwayat",[PerusahaanController::class,"daftarRiwayat"])->name("perusahaan.daftar.riwayat");
        });

        //myprofile perusahaan
        Route::prefix("myprofile")->group(function(){

            // halaman utama myprofile
            Route::get("/",[MyProfilePerusahaanController::class,"index"])->name("perusahaan.myprofile");

            // Halaman Form edit myprofile
            Route::get("/edit",[MyProfilePerusahaanController::class,"edit"])->name("perusahaan.myprofile.edit");
            // aksi dari form edit myprofile
            Route::put("/edit/{perusahaan}",[MyProfilePerusahaanController::class,"update"])->name("perusahaan.myprofile.edit.aksi");
        });

        // route jika tidak di ijinkan terkonfirmasi
        Route::middleware("terkonfirmasi")->group(function(){

        // ajuan konfirmasi
        Route::get("/ajuan-konfirmasi",[PerusahaanController::class,"showAjuan"])->name("perusahaan.ajuan");

        // ajuan konfirmasi aksi
        Route::post("/ajuan-konfirmasi",[PerusahaanController::class,"aksiAjuan"])->name("perusahaan.ajuan.aksi");
        });
   });
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
