<?php

namespace App\Http\Controllers\perusahaan\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // halaman verif email forgot password
    public function show(){
        return view("perusahaan.auth.verifEmail-forgot");
    }

    // aksi verif email forgot password

    // halaman otp forgot password
    public function showOtp(){
        return view("perusahaan.auth.otp-forgot");
    }

    // aksi halaman otp forgot password

    // halaman reset password
    public function showReset(){
        return view("perusahaan.auth.reset-password");
    }

    // aksi halaman reset password

    // resend otp
    
}
