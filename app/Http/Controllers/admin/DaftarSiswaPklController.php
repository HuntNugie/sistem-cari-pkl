<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarSiswaPklController extends Controller
{
    // halaman siswa pkl
    public function siswaPkl(){
        return view("admin.siswa-pkl");
    }
}
