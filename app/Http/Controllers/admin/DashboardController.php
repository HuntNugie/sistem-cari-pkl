<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Lamar;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
        // halaman dashboard admin
    public function dashboard(){
        $siswa = User::latest()->take(5)->get();
        $jumlah = User::all()->count();
        $perngajuan = Pengajuan::latest()->where("status_verifikasi","pending")->take(5)->get();
        $jmlSiswaPkl = Lamar::where("status","diterima")->count();
        $jmlPerusahaanKonf = Perusahaan::whereHas("perusahaanProfile",function($query){
            $query->where("status","terkonfirmasi");
        })->count();
        $jmlPerusahaanNonf = Perusahaan::whereHas("perusahaanProfile",function($query){
            $query->where("status","belum terkonfirmasi");
        })->count();
        return view("admin.dashboard", compact(['siswa','jumlah','perngajuan','jmlSiswaPkl','jmlPerusahaanKonf','jmlPerusahaanNonf']));
    }

}
