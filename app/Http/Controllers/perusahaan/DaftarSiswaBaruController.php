<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\User;
use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Models\SuratPemberitahuan;
use App\Http\Controllers\Controller;
use App\Mail\lamar_diterima;
use App\Mail\lamar_ditolak;
use Illuminate\Support\Facades\Mail;

class DaftarSiswaBaruController extends Controller
{
     public function daftarSiswaBaru()
    {
        $halaman = "Daftar siswa baru";
        $perusahaan = auth()->guard("perusahaan")->user();
        $siswa = Lamar::where("status","pending")->whereHas("lowongan",function($query) use($perusahaan){
            $query->where("status","tersedia")
            ->where("perusahaan_id",$perusahaan->id);
        })->get();
        return view("perusahaan.daftar-siswa-baru", ["halaman" => $halaman,"siswa" => $siswa]);
    }
    public function showSiswaBaru(Lamar $lamaran){
        $halaman = "Detail Siswa baru mendaftar";
        return view("perusahaan.detail-siswaBaru",compact(["lamaran","halaman"]));
    }

    // aksi terima
    public function diterima(Request $request,Lamar $lamaran){
       $valid =  $request->validate([
            "jadwal_kedatangan" => "required | date",
            "alamat" => "required",
            "catatan" => "nullable | string"
        ],[
            "jadwal_kedatangan.required" => "Jadwal datang tidak boleh kosong",
            "jadwal_kedatangan.date" => "Jadwal datang harus tanggal",
            "alamat.required" => "Alamat PKL tidak boleh kosong",
            "catatan.string" => "Catatan harus string"
        ]);
    
        $surat = $lamaran->suratDiterima()->create($valid);
        $lamaran->update([
            "status" => "diterima"
        ]);

       
        $siswa = $lamaran->siswa;
        $email = $siswa->email;
        $nama = $siswa->name;
        $sekolah = $siswa->user_profile->sekolah->nama_sekolah;
        $judul = $lamaran->lowongan->judul_lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan->perusahaanProfile->nama_perusahaan;
        Mail::to($email)->send(new lamar_diterima($nama,$sekolah,$judul,$perusahaan));

        // jika lamaran di terima lebih besar atau sama dengan kuota maka akna berubah menjadi penuh
        if(Lamar::where("lowongan_id",$lamaran->lowongan->id)->where("status","diterima")->count() >= $lamaran->lowongan->kuota){
            $lamaran->lowongan()->update([
                "status" => "penuh"
            ]);
        }
        return redirect()->route("perusahaan.daftar.siswa.baru")->with("sukses","Lamaran berhasil diterima");
    }

    public function ditolak(Request $request,Lamar $lamaran){
       $valid = $request->validate([
            "alasan" => "required | string"
        ],[
            "alasan.required" => "Alasan tidak boleh kosong",
            "alasan.string" => "Alasan harus string"
        ]);
        $surat = $lamaran->suratDitolak()->create($valid);
        $lamaran->update([
            "status" => "ditolak"
        ]);
        $siswa = $lamaran->siswa;
        $email = $siswa->email;
        $nama = $siswa->name;
        $sekolah = $siswa->user_profile->sekolah->nama_sekolah;
        $judul = $lamaran->lowongan->judul_lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan->perusahaanProfile->nama_perusahaan;
        Mail::to($email)->send(new lamar_ditolak($nama,$sekolah,$judul,$perusahaan));
        return redirect()->route("perusahaan.daftar.siswa.baru")->with("sukses","Lamaran berhasil ditolak");
    }
}
