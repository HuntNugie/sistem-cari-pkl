<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        $siswa = User::latest()->take(5)->get();
        $jumlah = User::all()->count();
         return view("admin.dashboard", compact(['siswa','jumlah']));
    }
    public function siswaAktif(){
        return view("admin.siswa-aktif");
    }
    public function siswaPkl(){
        return view("admin.siswa-pkl");
    }
    public function perkonf(){
        return view("admin.perusahaan-konf");
    }
    public function pernonf(){
        return view("admin.perusahaan-non");
    }
    public function daftarAdmin(){
        return view("admin.daftar-admin");
    }
    public function tambahAdmin(){
        return view("admin.tambah-admin");
    }
    public function kritikSaran(){
        return view("admin.kritik-saran");
    }
}
