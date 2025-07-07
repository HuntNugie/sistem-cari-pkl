<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarSiswaAktifController extends Controller
{
        // halaman siswa aktif
    public function siswaAktif(){
        return view("admin.siswa-aktif");
    }
}
