<?php

namespace App\Http\Controllers\public\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view("public.auth.register");
    }
}
