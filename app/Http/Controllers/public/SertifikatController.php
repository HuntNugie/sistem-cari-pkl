<?php

namespace App\Http\Controllers\public;

use App\Models\Lamar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class SertifikatController extends Controller
{
    public function index(){
        $user = auth()->guard("web")->user();
        $lamaran = $user->lamaran()->where("status","selesai")->first();
        if(!$lamaran){
            return redirect()->back()->with("gagal","anda tidak dapat mengakses halaman ini");
        }
        return view("public.sertifikat",compact(["lamaran"]));
    }
    public function showSertifikat(Lamar $lamaran){
        $siswa = auth()->guard("web")->user();
        $pdf = Pdf::loadView("pdf.sertifikat",compact(["lamaran","siswa"]));
        return $pdf->setPaper("a4","landscape")->stream("sertifikat-{$siswa->name}.pdf");
    }
    public function downloadSertifikat(Lamar $lamaran){
        $siswa = auth()->guard("web")->user();
        $pdf = Pdf::loadView("pdf.sertifikat",compact(["lamaran","siswa"]));
        return $pdf->setPaper("a4","landscape")->download("sertifikat-{$siswa->name}.pdf");
    }
}
