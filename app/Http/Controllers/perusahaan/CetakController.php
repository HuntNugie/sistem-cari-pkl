<?php

namespace App\Http\Controllers\perusahaan;

use App\Models\Lamar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CetakController extends Controller
{
    public function cetak(){
        $perusahaan = auth()->guard("perusahaan")->user();
        $siswas = Lamar::where("status","diterima")->whereHas("lowongan",function($q) use($perusahaan){
            $q->where("perusahaan_id",$perusahaan->id);
        })->get();  
        $pdf = Pdf::loadView('pdf.laporanpkl',compact(['perusahaan','siswas']));
        return $pdf->stream("laporan-pkl-{$perusahaan->perusahaanProfile->nama_perusahaan}.pdf");
    }
}
    