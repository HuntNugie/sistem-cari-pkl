<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Perusahaan_profile;
use App\Http\Controllers\Controller;

class InfoPerusahaanController extends Controller
{
    public function perkonf(Request $request){
        $perusahaan = Perusahaan_profile::where("status","terkonfirmasi")->filter($request->search)->paginate(5)->withQueryString();
        // if($request->has("search")){
        //     $hasil = $request->search;
        //     $perusahaan = Perusahaan_profile::where("status","terkonfirmasi")->where("nama_perusahaan","LIKE","%".$hasil."%")->get();
        // }

        return view("admin.perusahaan-konf",compact("perusahaan"));
    }

    // halaman perusahaan belum terkonfirmasi
    public function pernonf(Request $request){
        $perusahaan = Perusahaan_profile::where("status", "belum terkonfirmasi")->filter($request->search)->paginate(5)->withQueryString();

        return view("admin.perusahaan-non",compact("perusahaan"));
    }

}
