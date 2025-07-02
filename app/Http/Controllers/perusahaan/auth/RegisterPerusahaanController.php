<?php

namespace App\Http\Controllers\perusahaan\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterPerusahaanController extends Controller
{
    public function show(){
        return view("perusahaan.auth.register");
    }
}
