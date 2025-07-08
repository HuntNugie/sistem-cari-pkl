<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Jurusan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LowonganController extends Controller
{
     public function daftarLowongan()
    {
        $halaman = "daftar lowongan";
        $lowongan = Lowongan::with("perusahaan")->where("perusahaan_id",auth()->guard("perusahaan")->user()->id)->get();
        // Logic to fetch and display job listings
        return view("perusahaan.daftar-lowongan", ["halaman" => $halaman,"lowongan" => $lowongan]);
    }
    public function create(){
        $halaman = "Form tambah lowongan";
        $jurusan = Jurusan::all();
        return view("perusahaan.tambah-lowongan",compact(["halaman","jurusan"]));
    }
    public function storeLowongan(Request $request){
       $request->validate([
        "judul" => "required | string",
        "jurusan_id" => "required ",
        "kuota" => "required | integer",
        "deskripsi" => "required | string",
        "syarat" => "required"
       ],[
        "judul.required" => "Judul lowongan PKL wajib di isi",
        "judul.string" => "Judul harus berupa Teks",
        "jurusan_id.required" => "jurusan wajib di isi",
        "kuota.required" => "Kuota wajib di isi",
        "kuota.integer" => "Kuota harus berupa angka",
        "deskripsi.required" => "Deskripsi wajib di isi",
        "deskripsi.string" => "Deskripsi harus berupa teks",
        "syarat.required" => "syarat wajib di isi"
       ]);



    //    Masukkan ke dalam database
    $perusahaan = auth()->guard("perusahaan")->user();
    $lowongan = $perusahaan->lowongan()->create([
        "jurusan_id" => $request->jurusan_id,
        "judul_lowongan" => $request->judul,
        "kuota" => $request->kuota,
        "deskripsi_lowongan" => $request->deskripsi
    ]);

    // tambahkan ke dalam databse syarat dari lowongan nya
    foreach($request->syarat as $isi){
        if(trim($isi) !== ""){
            $lowongan->syarta()->create([
                "isi_syarat" => $isi
            ]);
        }
    }
    return redirect()->back()->with("sukses","berhasil membuat lowongan pkl");

    }

    // untuk menghapus lowongan yang sudah di buat
    public function destroyLowongan(Lowongan $lowongan){
        $lowongan->delete();
        return redirect()->back()->with("sukses","Berhasil menghapus lowongan");
    }

    // halaman detail lowongan
    public function showLowongan(Lowongan $lowongan){
        $halaman = "Halaman detial lowongan";
        return view("perusahaan.detail-lowongan",compact(["lowongan","halaman"]));
    }

    // halaman edit lowongan
    public function editLowongan(Lowongan $lowongan){
        $halaman = "Halaman Edit Lowongan";
        $jurusan = Jurusan::all();
        return view("perusahaan.edit-lowongan",compact(["halaman","jurusan","lowongan"]));
    }

    // Aksi halaman edit lowongan
    public function updateLowongan(Request $request,Lowongan $lowongan){
    $request->validate([
        "judul" => "required | string",
        "jurusan_id" => "required ",
        "kuota" => "required | integer",
        "deskripsi" => "required | string",
        "syarat" => "required"
       ],[
        "judul.required" => "Judul lowongan PKL wajib di isi",
        "judul.string" => "Judul harus berupa Teks",
        "jurusan_id.required" => "jurusan wajib di isi",
        "kuota.required" => "Kuota wajib di isi",
        "kuota.integer" => "Kuota harus berupa angka",
        "deskripsi.required" => "Deskripsi wajib di isi",
        "deskripsi.string" => "Deskripsi harus berupa teks",
        "syarat.required" => "syarat wajib di isi"
       ]);

      $low = $lowongan->update([
        "judul_lowongan" => $request->judul,
        "jurusan_id" => $request->jurusan_id,
        "kuota" => $request->kuota,
        "deskripsi_lowongan" => $request->deskripsi
      ]);


    //    hapus syarat
       $lowongan->syarat()->delete();

    //    masukkan syarat baru
      foreach($request->syarat as $isi){
        if(trim($isi) !== ""){
            $lowongan->syarat()->create([
                "isi_syarat" => $isi
            ]);
        }
      }

      return redirect()->back()->with("sukses","Berhasil mengedit lowongan");
    }

}
