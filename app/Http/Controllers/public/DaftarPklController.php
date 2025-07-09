<?php

namespace App\Http\Controllers\public;

use App\Models\Lamar;
use App\Models\Jurusan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarPklController extends Controller
{
    public function daftarPkl(Request $request){
        $lowongan = Lowongan::with(["perusahaan","jurusan","syarat"])->where("status","tersedia")->filter($request->search)->filterjurusan($request->jurusan)->paginate(6)->withQueryString();
        $jurusanList = Jurusan::all();
        return view("public.daftar-pkl",compact(["lowongan","jurusanList"]));
    }
    public function detailPkl(Lowongan $lowongan){
        $user = Lamar::where("user_id",auth()->guard("web")->user()->id)->latest()->first();
        return view("public.detail-pkl",compact(["lowongan","user"]));
    }
}
