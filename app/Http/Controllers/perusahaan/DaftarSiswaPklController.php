<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lamar;

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
}
