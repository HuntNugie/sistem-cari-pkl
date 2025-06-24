<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifOtpController extends Controller
{
    public function show(){
        return view("public.auth.otp");
    }
}
