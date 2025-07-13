<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarSiswaAktifController extends Controller
{
        // halaman siswa aktif
    public function siswaAktif(Request $request){
        $siswa = User::with("user_profile")->paginate(5)->withQueryString();
        if($request->has("search")){
            $siswa = User::filter($request->search)->paginate(5)->withQueryString();

        }
        return view("admin.siswa-aktif", compact(['siswa']));
    }
    public function destroySiswaAktif(User $user){
        $user->delete();
        return redirect()->route("admin.siswa.aktif")->with("sukses","Data berhasil dihapus");
    }
}
