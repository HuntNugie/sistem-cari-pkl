<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarSiswaBaruController extends Controller
{
     public function daftarSiswaBaru()
    {
        $halaman = "Daftar siswa baru";
        $perusahaan = auth()->guard("perusahaan")->user();
        $siswa = User::whereHas("lamaran",function($query) use($perusahaan){
            $query->whereHas("lowongan",function($q) use($perusahaan){
                $q->where("perusahaan_id",$perusahaan->id);
            });
        })->get();
        return view("perusahaan.daftar-siswa-baru", ["halaman" => $halaman,"siswa" => $siswa]);
    }
}
