<?php

namespace App\Http\Controllers\public;

use Exception;
use App\Models\Lowongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\pemberitahuanLamar;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LamaranController extends Controller
{
    public function storeLamar(Request $request,Lowongan $lowongan){
        $request->validate([
            "surat_pengantar" => "required | file | max:2048",
            "alasan" => "required | string"
        ],[
            "surat_pengantar.required" => "Anda wajib mengisi surat pengantar dari sekolah",
            "surat_pengantar.file" => "Surat pengantar wajib berformat file",
            "surat_pengantar.max" => "Surat pengantar anda lebih dari 2 mb",
            "alasan.required" => "Anda wajib mengisi alasan melamar ke tempat ini",
            "alasan.string" => "Alasan yang anda masukkan bukan lah sebuah string"
        ]);
        // ambil data user yang sudah login
        $user = auth()->guard("web")->user();

        // Masukan kedalam storage
        if($request->has("surat_pengantar")){
            $file = $request->file("surat_pengantar");
            $namaBaru = time()."-".Str::random(10).$file->getClientOriginalName();
            $path = $file->storeAs("lamaran",$namaBaru,"public");
            $request->surat_pengantar = $path;
        }
        // id lowongan
        $lowongan_id = $lowongan->id;
        $user->lamaran()->create([
            "lowongan_id" => $lowongan_id,
            "alasan" => $request->alasan,
            "surat_pengantar" => $request->surat_pengantar,
            "status" => "pending"
        ]);
        $email = $lowongan->perusahaan->email;
        $namaSiswa = $user->name;
        $jk = $user->user_profile->jk;
        $asalSekolah = $user->user_profile->sekolah->nama_sekolah;
        $judul = $lowongan->judul_lowongan;
        try {
             Mail::to($email)->send(new pemberitahuanLamar($namaSiswa,$jk,$judul,$asalSekolah));

        } catch (Exception $e) {
            //throw $th;
            Log::error("gagal mengirim email = ".$e->getMessage());
        }

        return redirect()->back()->with("sukses","Anda berhasil Melamar PKL untuk melihat perkembangan nya silahkan cek di riwayat lamaran");
    }
}
