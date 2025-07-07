<?php

namespace App\Http\Controllers\admin;

use Mail;
use App\Models\User;
use App\Models\Admin;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\Perusahaan_profile;
use App\Mail\pemberitahuan_ditolak;
use App\Http\Controllers\Controller;
use App\Mail\pemberitahuan_diterima;
use Illuminate\Support\Facades\Hash;
use Storage;

class AdminController extends Controller
{

    // halaman daftar admin
    public function daftarAdmin(Request $request){
        $superadmin = Admin::where("id","!=",auth()->guard("admin")->user()->id)->where("role","!=","admin")->filter($request->superadmin)->paginate(5)->withQueryString();
        $admin =  Admin::where("id","!=",auth()->guard("admin")->user()->id)->where("role","!=","super_admin")->filter($request->admin)->paginate(5)->withQueryString();
        return view("admin.daftar-admin",compact(["admin","superadmin"]));
    }

    // halaman tambah admin
    public function tambahAdmin(){
        return view("admin.tambah-admin");
    }

    // aksi tambah admin
    public function storeAdmin(Request $request){
        $request->validate([
            "username" => "required | string | unique:admins",
            "name" => "required | string",
            "email" => "required | email | unique:admin_profiles",
            "password" => "required",
            "konfirmasi_password" => "required"
        ],[
            "username.required" => "username wajib di isi",
            "username.string" => "username wajib string atau teks",
            "username.unique" => "username sudah di gunakan orang lain",
            "name.required" => "Nama admin wajib di isi",
            "name.string" => "nama admin harus lah string atau teks",
            "email.required" => "email wajib di isi",
            "email.email" => "email harus lah berupa email",
            "email.unique" => "email sudah di gunakan oleh orang lain",
            "password.required" => "password wajib di isi",
            "konfirmasi_password" => "konfirmasi password wajib di isi"
        ]);

        // jika password tidak sama dengan konfirmasi password
        if($request->password !== $request->konfirmasi_password){
            return redirect()->back()->with("gagal","Password dan konfirmasi password tidak sama");
        }

        $admin = Admin::create([
             "username" => $request->username,
                "password" => Hash::make($request->password)
        ]);

        $adminProfile = $admin->profile()->create([
           "name" => $request->name,
           "email" => $request->email
        ]);

        return redirect()->route("admin.tambah.admin")->with("sukses","Berhasil membuat daftar admin");
    }

    public function destroyAdmin(Admin $admin){
        // jika admin mempunyai foto maka hapus fotonya
        $foto = $admin->profile->foto;
        if($foto && Storage::disk("public")->exists($foto)){
            Storage::disk("public")->delete($foto);
        }
        $admin->delete();
        return redirect()->back()->with("sukses","Berhasil menghapus data admin");
    }

    // function mengubah role
    public function ubahRole(Admin $admin,$role){
        $admin->role = $role;
        $admin->save();
        return redirect()->back()->with("sukses","Berhasil mengubah ".$admin->profile->name." menjadi super admin");
    }
}
