<?php

namespace App\Http\Controllers\perusahaan\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginPerusahaanController extends Controller
{
    public function show(Request $request)
    {
        return view('perusahaan.auth.login'); // Ganti dengan view login perusahaan
    }
}
