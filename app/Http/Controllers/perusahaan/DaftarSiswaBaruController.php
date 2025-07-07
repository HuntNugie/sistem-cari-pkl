<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarSiswaBaruController extends Controller
{
     public function daftarSiswaBaru()
    {
        $halaman = "Daftar siswa baru";
        // Logic to fetch and display new students
        return view("perusahaan.daftar-siswa-baru", ["halaman" => $halaman]);
    }
}
