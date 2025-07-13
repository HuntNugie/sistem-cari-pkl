<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Lamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarRiwayatPklController extends Controller
{
    public function daftarRiwayat()
    {
        $halaman = "Daftar riwayat";
        $riwayat = Lamar::where("status","selesai")->whereHas("lowongan",function($query){
            $query->where("perusahaan_id",auth()->guard("perusahaan")->user()->id);
        })->get();
        return view("perusahaan.daftar-riwayat", ["halaman" => $halaman,"riwayats" => $riwayat]);
    }
    public function showRiwayat(Lamar $lamaran){
        $halaman = "Detail Riwayat siswa pkl";
        return view("perusahaan.detail-riwayat",compact(["halaman","lamaran"]));
    }
}
