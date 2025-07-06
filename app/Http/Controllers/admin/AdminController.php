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
    // halaman dashboard admin
    public function dashboard(){
        $siswa = User::latest()->take(5)->get();
        $jumlah = User::all()->count();
         return view("admin.dashboard", compact(['siswa','jumlah']));
    }

    // halaman siswa aktif
    public function siswaAktif(){
        return view("admin.siswa-aktif");
    }

    // halaman siswa pkl
    public function siswaPkl(){
        return view("admin.siswa-pkl");
    }

    // halaman perusahaan terkonfirmasi
    public function perkonf(){
        $perusahaan = Perusahaan_profile::where("status","terkonfirmasi")->get();
        return view("admin.perusahaan-konf",compact("perusahaan"));
    }

    // halaman perusahaan belum terkonfirmasi
    public function pernonf(){
        $perusahaan = Perusahaan_profile::where("status", "belum terkonfirmasi")->get();
        return view("admin.perusahaan-non",compact("perusahaan"));
    }

    // halaman daftar admin
    public function daftarAdmin(){
        $admin = Admin::where("id","!=",auth()->guard("admin")->user()->id)->get();
        return view("admin.daftar-admin",compact("admin"));
    }

    // halaman tambah admin
    public function tambahAdmin(){
        return view("admin.tambah-admin");
    }

    // halaman kritik dan saran
    public function kritikSaran(){
        return view("admin.kritik-saran");
    }

    // menampilkan halaman konfirmasi ajuan
    public function showAjuan(){
        $ajuan = Pengajuan::where("status_verifikasi","pending")->get();
        return view("admin.ajuan",compact("ajuan"));
    }

    // aksi konfirmasi ajuan
    public function konfirmasiAjuan(Request $request,Pengajuan $pengajuan){
        $request->validate([
            "alasan" => "required | string",
            "nilai" => "required"
        ]);
        // pengecekan dulu apakah di terima atau di tolak
        if($request->nilai === "diterima"){
            // ubah status di perusahaan profile
            $pengajuan->perusahaan->perusahaanProfile->status = "terkonfirmasi";
            $pengajuan->perusahaan->perusahaanProfile->save();

            // ubah status_verifikasi di pengajuan dan masukkan alasan
            $pengajuan->update(
                [
                    "alasan" => $request->alasan,
                    "status_verifikasi" => "diterima"
                ]
            );
            $this->emailAjuan($pengajuan,pemberitahuan_diterima::class);
            return redirect()->back()->with("sukses","Berhasil konfirmasi selesai perusahaan".$pengajuan->perusahaan->perusahaanProfile->nama_perusahaan);
        }else{
            // ubah status_verifikasi di pengajuan dan masukkan alasan
            $pengajuan->update(
                [
                    "alasan" => $request->alasan,
                    "status_verifikasi" => "ditolak"
                ]
            );
            $this->emailAjuan($pengajuan,pemberitahuan_ditolak::class);
            return redirect()->back()->with("sukses","Berhasil Menolak perusahaan".$pengajuan->perusahaan->perusahaanProfile->nama_perusahaan);
        }
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
}
