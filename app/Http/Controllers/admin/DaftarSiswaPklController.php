<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarSiswaPklController extends Controller
{
    // halaman siswa pkl
    public function siswaPkl(Request $request){
        $siswa = User::whereHas("lamaran",function($query){
            $query->where("status","diterima");
        })->paginate(5)->withQueryString();
        if($request->has("search")){
            $siswa = User::whereHas("lamaran",function($query){
                $query->where("status","diterima");
            })->filter($request->search)->paginate(5)->withQueryString();

        }
        return view("admin.siswa-pkl", compact(['siswa']));
    }
    
    public function detailSiswaPkl(User $siswa){
        return view("admin.detail-siswa-pkl", compact(['siswa']));
    }
}
