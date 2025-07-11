<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
       public function dashboard()
    {
    //  https://api.quotable.io/random?minLength=50&maxLength=80
        $halaman = "dashboard";
        $perusahaan = auth()->guard("perusahaan")->user();
        $siswaBaru = Lamar::where("status","pending")->whereHas("lowongan",function($query) use($perusahaan){
            $query->where("status","tersedia")->where("perusahaan_id",$perusahaan->id);
        })->get()->take(5);
        $jmlSiswaBaru = $siswaBaru->count();
        $siswaPkl = Lamar::where("status","diterima")->whereHas("lowongan",function($query) use($perusahaan){
            $query->where("perusahaan_id",$perusahaan->id);
        })->get();
        $jmlSiswaPkl = $siswaPkl->count();
        $lowongan = $perusahaan->lowongan()->where("status","tersedia")->get();
        $jmlLowongan = $lowongan->count();
        return view("perusahaan.dashboard", ["halaman" => $halaman,"jmlSiswaBaru" => $jmlSiswaBaru,"jmlSiswaPkl" => $jmlSiswaPkl,"jmlLowongan" => $jmlLowongan,"siswaBaru" => $siswaBaru]);
    }
}
