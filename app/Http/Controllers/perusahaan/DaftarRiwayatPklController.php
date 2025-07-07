<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarRiwayatPklController extends Controller
{
    public function daftarRiwayat()
    {
        $halaman = "Daftar riwayat";
        // Logic to fetch and display internship history
        return view("perusahaan.daftar-riwayat", ["halaman" => $halaman]);
    }
}
