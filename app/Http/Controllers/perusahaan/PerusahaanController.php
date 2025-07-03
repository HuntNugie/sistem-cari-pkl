<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PerusahaanController extends Controller
{

    public function dashboard()
    {
    //  https://api.quotable.io/random?minLength=50&maxLength=80
        $quote = "dashboard";
        return view("perusahaan.dashboard", ["quote" => $quote]);
    }
    public function daftarLowongan()
    {
        $quote = "daftar lowongan";
        // Logic to fetch and display job listings
        return view("perusahaan.daftar-lowongan", ["quote" => $quote]);
    }
    public function daftarSiswaBaru()
    {
        $quote = "Daftar siswa baru";
        // Logic to fetch and display new students
        return view("perusahaan.daftar-siswa-baru", ["quote" => $quote]);
    }
    public function daftarSiswaPkl()
    {
        $quote = "Daftar siswa PKl";
        // Logic to fetch and display students currently doing internships
        return view("perusahaan.daftar-siswa-pkl", ["quote" => $quote]);
    }
    public function daftarRiwayat()
    {
        $quote = "Daftar riwayat";
        // Logic to fetch and display internship history
        return view("perusahaan.daftar-riwayat", ["quote" => $quote]);
    }
    public function showAjuan(){
        $quote = "Pengajuan Konfirmasi Perusahaan";
        $perusahaan = auth()->guard("perusahaan")->user()->perusahaanProfile;
        return view("perusahaan.ajuan",["quote" => $quote,"perusahaan" => $perusahaan]);
    }
}
