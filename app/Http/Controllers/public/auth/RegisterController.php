<?php

namespace App\Http\Controllers\public\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        $id = session("user_id");
        $user = User::findOrFail($id);
        return view("public.auth.register",["email" => $user->email]);
    }
    public function register(Request $request){
        $request->validate([
            "name" => "required|string",
            "password" => "required",
            "password_confirmation" => "required"
        ]);
        if($request->password !== $request->password_confirmation){
            return redirect()->back()->withErrors(["gagal" => "konfirmasi password tidak sama dengan password"]);
        }
        $id = session("user_id");
       $user = User::findOrFail($id);
       $user->update([
        "name" => $request->name,
        "password" => Hash::make($request->password)
       ]);
        Auth::login($user);
        return redirect()->route("beranda");
    }
}
