<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
       public function dashboard()
    {
    //  https://api.quotable.io/random?minLength=50&maxLength=80
        $halaman = "dashboard";
        return view("perusahaan.dashboard", ["halaman" => $halaman]);
    }
}
