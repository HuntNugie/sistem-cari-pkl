<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MyProfilePerusahaanController extends Controller
{
    public function Index(){
        return view("perusahaan.myprofile",["halaman" => "Halaman Profile"]);
    }

    public function edit(){
        return view("perusahaan.edit-myprofile",["halaman" => "Halaman Edit Profile"]);
    }

    public function update(Request $request,Perusahaan $perusahaan){

       $valid = $request->validate([
           "logo" => "image ",
           "nama_perusahaan" => "string",
           "pemilik" => "string",
           "telepon" => "numeric",
           'alamat' => "string",
           "website" => "string",
           "deskripsi" => "string"
        ]);
        // cek apakah user menginputkan foto
        if($request->hasFile("logo")){
            // hapus foto lama
            if($perusahaan->perusahaanProfile->logo && Storage::disk("public")->exists($perusahaan->perusahaanProfile->logo)){
                Storage::disk("public")->delete($perusahaan->perusahaanProfile->logo);
            }
            // upload foto ke storage
            $file = $request->file("logo");
            // nama baru
            $namaBaru = time().Str::random(5).".".$file->getClientOriginalName();
            $foto = $file->storeAs("perusahaan",$namaBaru,"public");
            $valid["logo"] = $foto;
        }

        $perusahaan->perusahaanProfile->update($valid);
        return redirect()->route("perusahaan.myprofile")->with("sukses","Berhasil mengupdate profile ".$perusahaan->perusahaanProfile->nama_perusahaan);

    }
}
