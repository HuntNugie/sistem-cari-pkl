<?php

namespace App\Http\Controllers\public;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lamar;

class DaftarPklController extends Controller
{
    public function daftarPkl(){
        $lowongan = Lowongan::with(["perusahaan","jurusan","syarat"])->where("status","tersedia")->get();
        return view("public.daftar-pkl",compact("lowongan"));
    }
    public function detailPkl(Lowongan $lowongan){
        $user = Lamar::where("user_id",auth()->guard("web")->user()->id)->latest()->first();
        return view("public.detail-pkl",compact(["lowongan","user"]));
    }
}
