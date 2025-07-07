<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarPklController extends Controller
{
    public function daftarPkl(){
        return view("public.daftar-pkl");
    }
    public function detailPkl(){
        return view("public.detail-pkl");
    }
}
