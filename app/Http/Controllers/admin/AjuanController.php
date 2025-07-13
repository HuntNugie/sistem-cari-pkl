<?php

namespace App\Http\Controllers\admin;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\pemberitahuan_ditolak;
use App\Mail\pemberitahuan_diterima;
class AjuanController extends Controller
{
      // menampilkan halaman konfirmasi ajuan
    public function showAjuan(Request $request){
        $ajuan = Pengajuan::where("status_verifikasi","pending")->filter($request->search)->paginate(5)->withQueryString();
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
            $this->emailAjuan($pengajuan,pemberitahuan_diterima::class);
            return redirect()->back()->with("sukses","Berhasil konfirmasi selesai perusahaan".$pengajuan->perusahaan->perusahaanProfile->nama_perusahaan);
        }else{
            // ubah status_verifikasi di pengajuan dan masukkan alasan
            $pengajuan->update(
                [
                    "alasan" => $request->alasan,
                    "status_verifikasi" => "ditolak"
                ]
            );
            $this->emailAjuan($pengajuan,pemberitahuan_ditolak::class);
            return redirect()->back()->with("sukses","Berhasil Menolak perusahaan".$pengajuan->perusahaan->perusahaanProfile->nama_perusahaan);
        }
    }

    public function detailAjuan(Pengajuan $pengajuan){
        return view("admin.detail-ajuan",compact("pengajuan"));
    }
}
