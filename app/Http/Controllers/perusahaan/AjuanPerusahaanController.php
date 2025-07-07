<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Pengajuan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\pemberitahuan_admin;

class AjuanPerusahaanController extends Controller
{
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

        $ajuan = auth()->guard("perusahaan")->user()->ajuan()->where("status_verifikasi","pending")->latest()->first();
        if($ajuan){
            return redirect()->back()->with("gagal","anda tidak dapat mengajukan karna masih pending");
        }
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
