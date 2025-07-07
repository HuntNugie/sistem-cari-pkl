<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
     public function daftarLowongan()
    {
        $halaman = "daftar lowongan";
        // Logic to fetch and display job listings
        return view("perusahaan.daftar-lowongan", ["halaman" => $halaman]);
    }
    public function create(){
        $halaman = "Form tambah lowongan";
        return view("perusahaan.tambah-lowongan",compact("halaman"));
    }
}
