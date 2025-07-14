<?php

namespace App\Http\Controllers\admin;

use App\Mail\Kritiksaran AS KritikSaranMail;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class KritikDanSaranController extends Controller
{
      // halaman kritik dan saran
    public function kritikSaran(){
        return view("admin.kritik-saran");
    }

    // Aksi kritik dan saran user
    public function storeKritikSaran(Request $request){
       $valid =  $request->validate([
            "nama" => "required | string",
            "email" => "required | email",
            "subjek" => "required | string",
            "pesan" => "required | string",
        ],[
            "nama.required" => "Nama wajib diisi",
            "email.required" => "Email wajib diisi",
            "subjek.required" => "Subjek wajib diisi",
            "pesan.required" => "Pesan wajib diisi",
            "email.email" => "Email haruslah berupa email",
            "subjek.string" => "Subjek haruslah berupa Text",
            "pesan.string" => "Pesan haruslah berupa Text",
        ]);

        $kritikSaran = KritikSaran::create($valid);
        $nama = $request->nama;
        $email = $request->email;
        $subjek = $request->subjek;
        $pesan = $request->pesan;
        Mail::to("huntcode99@gmail.com")->send(new KritikSaranMail($nama,$email,$subjek,$pesan));
        return redirect()->back()->with("sukses","Kritik dan saran berhasil dikirim terima kasih atas kritik dan saran nya");
    }
}
