<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarSiswaPklController extends Controller
{
       public function daftarSiswaPkl()
    {
        $halaman = "Daftar siswa PKl";
        // Logic to fetch and display students currently doing internships
        return view("perusahaan.daftar-siswa-pkl", ["halaman" => $halaman]);
    }
}
