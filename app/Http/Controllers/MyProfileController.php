<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MyProfileController extends Controller
{
    public function show(){
        return view("public.myprofile");
    }
    public function edit(){
        $sekolahs = Sekolah::all();
        $jurusan = Jurusan::all();
        return view("public.editProfile", compact('sekolahs', 'jurusan'));
    }
    public function update(Request $request, User $siswa){
        $request->validate([
            'name' => 'required|string|max:255',

        ]);
        $profile = $request->validate(
              [
            'jurusan_id' => 'required|exists:jurusans,id',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'foto' => 'image',
            'telepon' => 'required|string|max:20',
            'kelas' => 'required|string|max:10',
            'nis' => 'required|string|max:20',
            'jk' => 'required'
              ]
        );
        // cek apakah user mau mengganti foto
        if($request->hasFile('foto')){
            // hapus terlebih dahulu foto lama
            if($siswa->foto && Storage::disk("public")->exists($siswa->foto) ){
                Storage::disk('public')->delete($siswa->foto);
            }
            // ganti nama foto
            $foto = $request->file('foto');
            $namaBaru = time().Str::random(10).'.'.$foto->getClientOriginalName();
            $path = $foto->storeAs('siswa', $namaBaru, 'public');
            // simpan foto baru
            $profile["foto"] = $path;
        }
        $siswa->update($request->only('name'));

        $siswa->user_profile()->update(
            $profile
        );

        return redirect()->route('public.myprofile')->with('sukses', 'Profile updated successfully.');
    }
}
