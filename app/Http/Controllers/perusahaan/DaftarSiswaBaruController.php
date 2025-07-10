<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\User;
use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratPemberitahuan;

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
        return redirect()->route("perusahaan.daftar.siswa.baru")->with("sukses","Lamaran berhasil ditolak");
    }
}
