<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\User;
use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
