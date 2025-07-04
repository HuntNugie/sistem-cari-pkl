<?php

namespace App\Http\Controllers\admin;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Models\Perusahaan_profile;

class AdminController extends Controller
{
    public function dashboard(){
        $siswa = User::latest()->take(5)->get();
        $jumlah = User::all()->count();
         return view("admin.dashboard", compact(['siswa','jumlah']));
    }
    public function siswaAktif(){
        return view("admin.siswa-aktif");
    }
    public function siswaPkl(){
        return view("admin.siswa-pkl");
    }
    public function perkonf(){
        $perusahaan = Perusahaan_profile::where("status","terkonfirmasi")->get();
        return view("admin.perusahaan-konf",compact("perusahaan"));
    }
    public function pernonf(){
        $perusahaan = Perusahaan_profile::where("status", "belum terkonfirmasi")->get();
        return view("admin.perusahaan-non",compact("perusahaan"));
    }
    public function daftarAdmin(){
        return view("admin.daftar-admin");
    }
    public function tambahAdmin(){
        return view("admin.tambah-admin");
    }
    public function kritikSaran(){
        return view("admin.kritik-saran");
    }

    // menampilkan halaman konfirmasi ajuan
    public function showAjuan(){
        $ajuan = Pengajuan::where("status_verifikasi","pending")->get();
        return view("admin.ajuan",compact("ajuan"));
    }

    // aksi konfirmasi ajuan
    public function konfirmasiAjuan(Request $request,Pengajuan $pengajuan){
        $request->validate([
            "alasan" => "required | string",
            "nilai" => "required"
        ]);
        // pengecekan dulu apakah di terima atau di tolak
        if($request->nilai === "diterima"){
            // ubah status di perusahaan profile
            $pengajuan->perusahaan->perusahaanProfile->status = "terkonfirmasi";
            $pengajuan->perusahaan->perusahaanProfile->save();

            // ubah status_verifikasi di pengajuan dan masukkan alasan
            $pengajuan->update(
                [
                    "alasan" => $request->alasan,
                    "status_verifikasi" => "diterima"
                ]
                );
            return redirect()->back()->with("sukses","Berhasil konfirmasi selesai perusahaan".$pengajuan->perusahaan->perusahaanProfile->nama_perusahaan);
        }else{
            // ubah status_verifikasi di pengajuan dan masukkan alasan
            $pengajuan->update(
                [
                    "alasan" => $request->alasan,
                    "status_verifikasi" => "ditolak"
                ]
                );
            return redirect()->back()->with("sukses","Berhasil Menolak perusahaan".$pengajuan->perusahaan->perusahaanProfile->nama_perusahaan);
        }
    }

}
