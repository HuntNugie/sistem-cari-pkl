<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\User;
use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\lamar_selesai;
use Illuminate\Support\Facades\Mail;

class DaftarSiswaPklController extends Controller
{
       public function daftarSiswaPkl()
    {
        $halaman = "Daftar siswa PKl";
        $perusahaan = auth()->guard("perusahaan")->user();
        $siswa = Lamar::where("status","diterima")->whereHas("lowongan",function($query) use($perusahaan){
            $query->where("perusahaan_id",$perusahaan->id);
        })->get();
        return view("perusahaan.daftar-siswa-pkl", ["halaman" => $halaman,"siswa" => $siswa]);
    }

    public function showSiswaPkl(Lamar $lamaran){
        $halaman = "Detail siswa PKL";  
        return view("perusahaan.detail-siswa-pkl",compact(["halaman","lamaran"]));
    }
    
    public function konfirmasi(Lamar $lamaran){
        $lamaran->update([
            "status" => "selesai"
        ]);
        $siswa = $lamaran->siswa;
        $email = $siswa->email;
        $nama = $siswa->name;
        $sekolah = $siswa->user_profile->sekolah->nama_sekolah;
        $judul = $lamaran->lowongan->judul_lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan->perusahaanProfile->nama_perusahaan;   
        $tgl_selesai = $lamaran->updated_at->format("d F Y");
        Mail::to($email)->send(new lamar_selesai($nama,$sekolah,$judul,$perusahaan,$tgl_selesai));
        return redirect()->route("perusahaan.daftar.siswa.pkl")->with("sukses","Berhasil mengkonfirmasi lamaran");
    }
}
