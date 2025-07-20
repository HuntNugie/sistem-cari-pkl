<?php

namespace App\Http\Controllers\public;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoPerusahaanController extends Controller
{
    public function show(Perusahaan $perusahaan){
        return view("public.detail-perusahaan",compact("perusahaan"));
    }
}
