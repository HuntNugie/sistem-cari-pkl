<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
        // halaman dashboard admin
    public function dashboard(){
        $siswa = User::latest()->take(5)->get();
        $jumlah = User::all()->count();
         return view("admin.dashboard", compact(['siswa','jumlah']));
    }

}
