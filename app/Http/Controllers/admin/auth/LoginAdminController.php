<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function username(){
        return "username";
    }
    public function show(){
        return view("admin.auth.login");
    }
    public function login(Request $request){
        $request->validate([
            "username" => "required | string",
            "password" => "required"
        ]);

        // remember me
            $remember = $request->filled("remember");

        // proses login
        if(auth()->guard("admin")->attempt($request->only("username","password"), $remember)){
            return redirect()->intended(route("admin.dashboard"));
        }
        return back()->withErrors(["gagal" => "Email atau password yang anda masukkan salah"]);
    }
}
