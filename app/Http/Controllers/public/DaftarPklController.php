<?php

namespace App\Http\Controllers\public;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarPklController extends Controller
{
    public function daftarPkl(){
        $lowongan = Lowongan::with(["perusahaan","jurusan","syarat"])->where("status","tersedia")->get();
        return view("public.daftar-pkl",compact("lowongan"));
    }
    public function detailPkl(){
        return view("public.detail-pkl");
    }
}
