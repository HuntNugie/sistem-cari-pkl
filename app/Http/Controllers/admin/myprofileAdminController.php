<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class myprofileAdminController extends Controller
{
    public function show()
    {
        return view("admin.myprofile");
    }
    public function edit()
    {
        return view("admin.edit-myprofile");
    }
    public function update(Request $request,Admin $admin){
        $valid = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'phone' => "numeric",
            'nomor_pegawai' => 'string|max:20',
            'foto' => 'image|nullable',
        ]);
        // cek apakah user mau mengganti foto
        if($request->hasFile('foto')){
            // hapus terlebih dahulu
            if($admin->profile->foto && Storage::disk("public")->exists($admin->profile->foto)){
                Storage::disk('public')->delete($admin->profile->foto);
            }
            // ganti nama foto
            $foto = $request->file('foto');
            $namaBaru = time()."".Str::random(5).'.'.$foto->getClientOriginalName();
            $path = $foto->storeAs('admin',$namaBaru,'public');

            $valid["foto"] = $path;
        }
        $admin->profile->update($valid);
        return redirect()->route('admin.myprofile')->with('sukses', 'Profile admin telah di update');
    }
}
