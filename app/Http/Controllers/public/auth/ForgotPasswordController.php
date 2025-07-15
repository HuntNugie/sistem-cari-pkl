<?php

namespace App\Http\Controllers\public\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function show(){
        return view("public.auth.verfEmail-forgot");
    }

    public function showOtp(){
        return view("public.auth.otp-forgot");
    }

    public function showReset(){
        return view("public.auth.reset-forgot");
    }
}
