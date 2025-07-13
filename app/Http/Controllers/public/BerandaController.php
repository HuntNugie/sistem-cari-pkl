<?php

namespace App\Http\Controllers\public;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index(){
        $lowongan = Lowongan::where("status","tersedia")->latest()->take(3)->get();
        return view("public.index",compact("lowongan"));
    }
}
