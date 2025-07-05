<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Pengajuan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\pemberitahuan_admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PerusahaanController extends Controller
{

    public function dashboard()
    {
    //  https://api.quotable.io/random?minLength=50&maxLength=80
        $halaman = "dashboard";
        return view("perusahaan.dashboard", ["halaman" => $halaman]);
    }
    public function daftarLowongan()
    {
        $halaman = "daftar lowongan";
        // Logic to fetch and display job listings
        return view("perusahaan.daftar-lowongan", ["halaman" => $halaman]);
    }
    public function daftarSiswaBaru()
    {
        $halaman = "Daftar siswa baru";
        // Logic to fetch and display new students
        return view("perusahaan.daftar-siswa-baru", ["halaman" => $halaman]);
    }
    public function daftarSiswaPkl()
    {
        $halaman = "Daftar siswa PKl";
        // Logic to fetch and display students currently doing internships
        return view("perusahaan.daftar-siswa-pkl", ["halaman" => $halaman]);
    }
    public function daftarRiwayat()
    {
        $halaman = "Daftar riwayat";
        // Logic to fetch and display internship history
        return view("perusahaan.daftar-riwayat", ["halaman" => $halaman]);
    }
    public function showAjuan(){
        $halaman = "Pengajuan Konfirmasi Perusahaan";
        $perusahaan = auth()->guard("perusahaan")->user()->perusahaanProfile;
        return view("perusahaan.ajuan",["halaman" => $halaman,"perusahaan" => $perusahaan]);
    }
    public function aksiAjuan(Request $request){
        $valid = $request->validate([
            "nomor_izin_usaha" => "required | string",
            "file_pendukung" => "required | file | mimes:pdf"
        ]);

        // ganti nama file
        $file = $request->file("file_pendukung");
        $namaBaru = time()."-".Str::random(5)."-".$file->getClientOriginalName();
        $path = $file->storeAs("ajuan-pdf",$namaBaru,"public");

        $id = auth()->guard("perusahaan")->user()->id;
        // masukkan ke dalam databse
        $ajuan = Pengajuan::create([
            "file_pendukung" => $path,
            "perusahaan_id" => $id
        ]);
        $ajuan->perusahaan->perusahaanProfile()->update(
            ["nomor_izin_usaha" => $request->nomor_izin_usaha]
        );
        $nama = $ajuan->perusahaan->perusahaanProfile->nama_perusahaan;
        $pemilik = $ajuan->perusahaan->perusahaanProfile->pemilik;
        $email = $ajuan->perusahaan->email;
        $tanggal = now()->format('d F Y H:i');
        Mail::to("huntcode99@gmail.com")->send(new pemberitahuan_admin($nama,$pemilik,$email,$tanggal));

        return redirect()->back()->with("sukses","Berhasil mengirim ajuan ke admin, mohon menunggu admin untuk konfirmasi");

    }
}
