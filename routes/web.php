<?php

use App\Models\User;

use App\Models\Sekolah;
use App\Mail\verifEmail;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifOtpController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\VerifEmailController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AjuanController;
use App\Http\Controllers\public\BerandaController;
use App\Http\Controllers\public\LamaranController;
use App\Http\Controllers\perusahaan\CetakController;
use App\Http\Controllers\public\DaftarPklController;
use App\Http\Controllers\public\auth\LoginController;
use App\Http\Controllers\public\SertifikatController;
use App\Http\Controllers\perusahaan\LowonganController;
use App\Http\Controllers\admin\InfoPerusahaanController;
use App\Http\Controllers\admin\KritikDanSaranController;
use App\Http\Controllers\admin\myprofileAdminController;
use App\Http\Controllers\perusahaan\DashboardController;
use App\Http\Controllers\public\auth\RegisterController;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\public\RiwayatLamaranController;
use App\Http\Controllers\admin\DaftarSiswaAktifController;
use App\Http\Controllers\perusahaan\DaftarSiswaPklController;
use App\Http\Controllers\perusahaan\AjuanPerusahaanController;
use App\Http\Controllers\perusahaan\DaftarSiswaBaruController;
use App\Http\Controllers\public\auth\ForgotPasswordController;
use App\Http\Controllers\perusahaan\DaftarRiwayatPklController;
use App\Http\Controllers\perusahaan\MyProfilePerusahaanController;
use App\Http\Controllers\perusahaan\auth\LoginPerusahaanController;
use App\Http\Controllers\perusahaan\auth\RegisterPerusahaanController;
use App\Http\Controllers\perusahaan\auth\ForgotPasswordController as PerusahaanForgotPasswordController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\DaftarSiswaPklController as AdminDaftarSiswaPklController;


// landing page
Route::get('/', [BerandaController::class,"index"])->name("beranda");


// daftar pkl
Route::middleware("auth")->group(function(){
    // daftar seluruh pkl
    Route::prefix("daftar-pkl")->group(function(){


        Route::get("/",[DaftarPklController::class,"daftarPkl"])->name("public.daftar.pkl");

        Route::middleware("jagaDaftar")->group(function(){
            // detail pkl
            Route::get("/detail/{lowongan}",[DaftarPklController::class,"detailPkl"])->name("public.detail.pkl");

            // aksi lamaran
            Route::post("/lamar/{lowongan}",[LamaranController::class,"storeLamar"])->name("public.lamaran.aksi")->middleware("tolakPending");
        });

    });
    // Route myprofile User
    Route::prefix("myprofile")->group(function(){

        // Halaman utama myprofile user
        Route::get("/profile",[MyProfileController::class,"show"])->name("public.myprofile")->middleware("auth");

        // Halaman Edit myprofile user
        Route::get("/edit",[MyProfileController::class,"edit"])->name("public.myprofile.edit")->middleware("auth");

        // Aksi Edit myprofile user
        Route::put("/update/{siswa}",[MyProfileController::class,"update"])->name("public.myprofile.update")->middleware("auth");
    });

    Route::prefix("/riwayat-lamaran")->group(function(){
        // Route riwayat lamaran
        Route::get("/",[RiwayatLamaranController::class,"index"])->name("public.riwayat.lamaran");

    // Route meelihat pdf

        Route::prefix("pdf")->group(function(){

            // Route pdf diterima
            Route::middleware("jagaPdf")->prefix("diterima")->group(function(){
                    // route untuk melihat pdf diterima
                    Route::get("/lihat/{lamaran}",[RiwayatLamaranController::class, "showPdfDiterima"])->name("public.pdf.lihat.diterima");

                    // route untuk mendownload pdf diterima
                    Route::get("/download/{lamaran}",[RiwayatLamaranController::class, "downloadPdfDiterima"])->name("public.pdf.download.diterima");
            });

            // Route pdf ditolak
            Route::middleware("jagaPdfTolak")->prefix("ditolak")->group(function(){
                    // route untuk melihat pdf ditolak
                    Route::get("/lihat/{lamaran}",[RiwayatLamaranController::class, "showPdfDitolak"])->name("public.pdf.lihat.ditolak");

                    // route untuk mendownload pdf ditolak
                    Route::get("/download/{lamaran}",[RiwayatLamaranController::class, "downloadPdfDitolak"])->name("public.pdf.download.ditolak");
            });

            // Route pdf sertifikat
            Route::middleware("jagaSertifikat")->prefix("sertifikat")->group(function(){

                    // halaman sertifikat
                    Route::get("/",[SertifikatController::class,"index"])->name("public.sertifikat");
                    // Route untuk sertifikat
                    Route::get("lihat/{lamaran}",[SertifikatController::class, "showSertifikat"])->name("public.pdf.lihat.sertifikat");

                    // Route untuk download sertifikat
                    Route::get("download/{lamaran}",[SertifikatController::class, "downloadSertifikat"])->name("public.pdf.download.sertifikat");
            });
        });

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
        Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasi"])->name("public.verifEmail.aksi");

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

      Route::middleware("jagaRegister")->group(function(){
          // memasukkan data diri
        Route::get("/isi-data",[RegisterController::class,"show"])->name("public.register");

        // aksi untuk memasukkan data diri
        Route::post("/isi-data",[RegisterController::class,"register"])->name("public.register.aksi");
      });
    });
    
    // Route untuk forgot password
    Route::prefix("forgot-password")->group(function(){
        // halaman email forgot password user
       Route::get("/",[ForgotPasswordController::class,"show"])->name("public.verifEmail.forgot");

        // aksi halaman email forgot password user
        Route::post("/",[ForgotPasswordController::class,"cekEmail"])->name("public.verifEmail.forgot.aksi");

        // Halaman Otp forgot passwrod user
        Route::get("/otp",[ForgotPasswordController::class,"showOtp"])->name("public.otp.forgot")->middleware("cekEmailForgot");

        // aksi halaman Otp forgot password user
        Route::post("/otp",[ForgotPasswordController::class,"cekOtp"])->name("public.otp.forgot.aksi")->middleware("cekEmailForgot");

        // halaman reset password user
        Route::get("/reset",[ForgotPasswordController::class,"showReset"])->name("public.reset.password")->middleware("cekOtpForgot");

        // aksi halaman reset password user
        Route::post("/reset",[ForgotPasswordController::class,"updatePassword"])->name("public.reset.password.aksi")->middleware("cekOtpForgot");

        // resend otp
        Route::get("/resend",[ForgotPasswordController::class,"resendOtp"])->name("public.resend.otp");
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
        Route::get("/dashboard",[AdminDashboardController::class,"dashboard"])->name("admin.dashboard");

        Route::prefix("siswa-aktif")->group(function(){
            //Halaman daftar siswa aktif
            Route::get("/",[DaftarSiswaAktifController::class,"siswaAktif"])->name("admin.siswa.aktif");

            // detail siswa aktif
            Route::get("/detail/{siswa}",[DaftarSiswaAktifController::class,"detailSiswaAktif"])->name("admin.siswa.aktif.detail");

            // Aksi delete siswa aktif
            Route::delete("/hapus/{user}",[DaftarSiswaAktifController::class,"destroySiswaAktif"])->name("admin.siswa.aktif.hapus");
        });

        Route::prefix("siswa-pkl")->group(function(){
            //Halaman daftar siswa pkl
            Route::get("/",[AdminDaftarSiswaPklController::class,"siswaPkl"])->name("admin.siswa.pkl");

            // detail siswa pkl
            Route::get("/detail/{siswa}",[AdminDaftarSiswaPklController::class,"detailSiswaPkl"])->name("admin.siswa.pkl.detail");
        });

        Route::prefix("perusahaan-terkonfirmasi")->group(function(){
            //Halaman daftar perusahaan terkonfirmasi
            Route::get("/",[InfoPerusahaanController::class,"perkonf"])->name("admin.perusahaan.terkonfirmasi");

            // halaman detail perusahaan terkonfirmasi
            Route::get("/detail/{perusahaan}",[InfoPerusahaanController::class,"detailPerkonf"])->name("admin.perusahaan.terkonfirmasi.detail");

           
        });
         // aksi hapus perusahaan 
         Route::delete("perusahaan/hapus/{perusahaan}",[InfoPerusahaanController::class,"destroyPerusahaan"])->name("admin.perusahaan.hapus");

        //Halaman daftar perusahaan belum terkonfirmasi
        Route::get("/perusahaan-belum-terkonfirmasi",[InfoPerusahaanController::class,"pernonf"])->name("admin.perusahaan.belum.terkonfirmasi");

        // route middleware unutk superadmin saja
        Route::middleware("superadmin")->group(function(){
            //Halaman daftar admin
            Route::get("/daftar-admin",[AdminController::class,"daftarAdmin"])->name("admin.daftar.admin");

            //Halaman tambah admin
            Route::get("/tambah-admin",[AdminController::class,"tambahAdmin"])->name("admin.tambah.admin");

            // aksi tambah admin
            Route::post("/tambah-admin",[AdminController::class,"storeAdmin"])->name("admin.tambah.admin.aksi");

            // aksi hapus admin
            Route::delete("/hapus-admin/{admin}",[AdminController::class,"destroyAdmin"])->name("admin.hapus.admin.aksi");

            // aksi mengubah role admin
            Route::post("/role/{admin}/{role}",[AdminController::class,"ubahRole"])->name("admin.ubah.role");
        });


        //Halamam kritik dan saran
        Route::get("/kritik-saran",[KritikDanSaranController::class,"kritikSaran"])->name("admin.kritik.saran");

       
        // halaman my profile admin
        Route::prefix("myprofile")->group(function(){
            // Halaman utama myprofile
            Route::get("/",[myprofileAdminController::class,"show"])->name("admin.myprofile");

            // Halaman edit Myprofile
            Route::get("/edit",[myprofileAdminController::class,"edit"])->name("admin.myprofile.edit");

            // Aksi edit myprofile
            Route::put("/update/{admin:username}",[myprofileAdminController::class,"update"])->name("admin.myprofile.update");
        });

        Route::prefix("daftar-ajuan")->group(function(){
            // Halaman Daftar Ajuan Perusahaan
            Route::get("/",[AjuanController::class,"showAjuan"])->name("admin.ajuan");

            // mengupdate konfirmasi ajuan perusahaan
            Route::put("/konfirmasi/{pengajuan}",[AjuanController::class,"konfirmasiAjuan"])->name("admin.ajuan.aksi");

            // detail ajuan perusahaan
            Route::get("/detail/{pengajuan}",[AjuanController::class,"detailAjuan"])->name("admin.ajuan.detail");
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

        // Route untuk register
        Route::prefix("register")->group(function(){
            //Halaman verifikasi email perusahaan
            Route::get("/verifikasi-email",[VerifEmailController::class,"showPerusahaan"])->name("perusahaan.verifEmail");

            //Aksi verifikasi email perusahaan
            Route::post("/verifikasi-email",[VerifEmailController::class,"verifikasiPerusahaan"])->name("perusahaan.verifEmail.aksi");


            Route::middleware("jagaRegister")->group(function(){
                //Halaman register perusahaan
                Route::get("/isi-data",[RegisterPerusahaanController::class,"show"])->name("perusahaan.register");

                // Aksi register perusahaan
                Route::post("/isi-data",[RegisterPerusahaanController::class,"register"])->name("perusahaan.register.aksi");
            });

            // Route jika
            Route::middleware("jagaOtp")->group(function(){
                //Halaman verifikasi otp email perusahaan
                Route::get("/otp",[VerifOtpController::class,"otpPerusahaan"])->name("perusahaan.otp");


                //Aksi verifikasi otp email perusahaan
                Route::post("/otp",[VerifOtpController::class,"verifOtpPerusahaan"])->name("perusahaan.otp.aksi");



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

        // route untuk forgot password
        Route::prefix("forgot-password")->group(function(){
            // halaman email forgot password perusahaan
            Route::get("/",[PerusahaanForgotPasswordController::class,"show"])->name("perusahaan.verifEmail.forgot");

            // halaman otp forgot password perusahaan
            Route::get("/otp",[PerusahaanForgotPasswordController::class,"showOtp"])->name("perusahaan.otp.forgot");
            
            // halaman reset password perusahaan
            Route::get("/reset",[PerusahaanForgotPasswordController::class,"showReset"])->name("perusahaan.reset.password");
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
        Route::get("/dashboard",[DashboardController::class,"dashboard"])->name("perusahaan.dashboard");

        // route jika status di ijinkan terkonfirmasi
        Route::middleware(["cekTerkonfirmasi"])->group(function(){

           Route::prefix("daftar-siswa-baru")->group(function(){
             // daftar siswa baru
            Route::get("/",[DaftarSiswaBaruController::class,"daftarSiswaBaru"])->name("perusahaan.daftar.siswa.baru");

            // detail siswa baru
            Route::get("/detail/{lamaran}",[DaftarSiswaBaruController::class,"showSiswaBaru"])->name("perusahaan.detail.siswa.baru");

            // aksi terima siswa baru
            Route::put("/terima/{lamaran}",[DaftarSiswaBaruController::class,"diterima"])->name("perusahaan.terima.siswa.baru");

            // aksi tolak siswa baru
            Route::put("/tolak/{lamaran}",[DaftarSiswaBaruController::class,"ditolak"])->name("perusahaan.tolak.siswa.baru");
           });
           Route::prefix("daftar-siswa-pkl")->group(function(){
                // daftar siswa sedang pkl
                Route::get("/",[DaftarSiswaPklController::class,"daftarSiswaPkl"])->name("perusahaan.daftar.siswa.pkl");

                // detail siswa pkl
                Route::get("/detail/{lamaran}",[DaftarSiswaPklController::class,"showSiswaPkl"])->name("perusahaan.detail.siswa.pkl");

                // route untuk konfirmasi siswa selesai pkl
                Route::put("/konfirmasi/{lamaran}",[DaftarSiswaPklController::class, "konfirmasi"])->name("perusahaan.konfirmasi.siswa.pkl");

                // route untuk cetak siswa sedang pkl
                Route::get("/cetak",[CetakController::class,"cetak"])->name("perusahaan.cetak.siswa.pkl");

                // route untuk download laporan siswa
                Route::get("/download",[CetakController::class,"download"])->name("perusahaan.download.siswa.pkl");
           });



            // daftar siswa riwayat perusahaan
            Route::prefix("daftar-siswa-riwayat")->group(function(){
                
                // halaman daftar riwayat siswa pkl
                Route::get("/",[DaftarRiwayatPklController::class,"daftarRiwayat"])->name("perusahaan.daftar.riwayat");

                // detail riwayat siswa pkl
                Route::get("/detail/{lamaran}",[DaftarRiwayatPklController::class,"showRiwayat"])->name("perusahaan.detail.riwayat");

                // aksi cetak riwayat siswa pkl
                Route::get("/cetak",[CetakController::class,"cetakRiwayat"])->name("perusahaan.cetak.riwayat");

                // aksi downloaad riwayat siswa pkl
                Route::get("/download",[CetakController::class,"downloadRiwayat"])->name("perusahaan.download.riwayat");
            });

            // Halaman lowongan
            Route::prefix("lowongan")->group(function(){
                 // daftar lowongan kerja
                Route::get("/daftar-lowongan",[LowonganController::class,"daftarLowongan"])->name("perusahaan.daftar.lowongan");

                // Halaman tambah lowongan
                Route::get("/tambah",[LowonganController::class,"create"])->name("perusahaan.tambah.lowongan");

                // aksi tambah lowongan
                Route::post("/tambah",[LowonganController::class,"storeLowongan"])->name("perusahaan.tambah.lowongan.aksi");

                // aksi hapus lowongan
                Route::delete("/hapus/{lowongan}",[LowonganController::class,"destroyLowongan"])->name("perusahaan.hapus.lowongan");

                // Halaman Detail lowongan
                Route::get("/detail/{lowongan}",[LowonganController::class,"showLowongan"])->name("perusahaan.detail.lowongan");

                // Halaman Edit lowongan
                Route::get("/edit/{lowongan}",[LowonganController::class,"editLowongan"])->name("perusahaan.edit.lowongan");

                // aksi halaman edit lowongan
                Route::put("/edit/{lowongan}",[LowonganController::class,"updateLowongan"])->name("perusahaan.update.lowongan.aksi");
            });
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
            Route::get("/ajuan-konfirmasi",[AjuanPerusahaanController::class,"showAjuan"])->name("perusahaan.ajuan");

            // ajuan konfirmasi aksi
            Route::post("/ajuan-konfirmasi",[AjuanPerusahaanController::class,"aksiAjuan"])->name("perusahaan.ajuan.aksi");
        });
   });
});

 // aksi kritik dan saran
 Route::post("/kritik-saran",[KritikDanSaranController::class, "storeKritikSaran"])->name("admin.kritik.saran.aksi");

// Route::get("/tes",function(){
//     return view("pdf.sertifikat");
// });
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
