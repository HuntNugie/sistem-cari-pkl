<?php

namespace App\Http\Controllers\public;

use App\Models\Lamar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class RiwayatLamaranController extends Controller
{
    public function index(){
        $siswa = auth()->guard("web")->user();
        $lamaran = $siswa->lamaran()->orderBy("created_at","desc")->get();
        return view("public.riwayat-lamaran",compact(["siswa","lamaran"]));
    }
    public function showPdfDiterima(Lamar $lamaran){
        $siswa = auth()->guard("web")->user();
        $surat = $lamaran->suratDiterima()->first();
        $lowongan = $lamaran->lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan;
        $pdf =Pdf::loadView("pdf.suratDiterima",compact(["lamaran","siswa","surat","perusahaan","lowongan"]));
        $namaPdf = "surat-pemberitahuan-diterima-{$siswa->name}.pdf";
        return $pdf->stream($namaPdf); 
    }
    public function downloadPdfDiterima(Lamar $lamaran){
        $siswa = auth()->guard("web")->user();
        $surat = $lamaran->suratDiterima()->first();
        $lowongan = $lamaran->lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan;
        $pdf =Pdf::loadView("pdf.suratDiterima",compact(["lamaran","siswa","surat","perusahaan","lowongan"]));
        $namaPdf = "surat-pemberitahuan-diterima-{$siswa->name}.pdf";
        return $pdf->download($namaPdf); 
    }

    public function showPdfDitolak(Lamar $lamaran){
        $siswa = auth()->guard("web")->user();
        $surat = $lamaran->suratDitolak()->first();
        $lowongan = $lamaran->lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan;
        $alasan = $surat->alasan;
        $pdf =Pdf::loadView("pdf.suratDitolak",compact(["lamaran","siswa","surat","perusahaan","lowongan","alasan"]));
        $namaPdf = "surat-pemberitahuan-ditolak-{$siswa->name}.pdf";
        return $pdf->stream($namaPdf); 
    }
    public function downloadPdfDitolak(Lamar $lamaran){
        $siswa = auth()->guard("web")->user();
        $surat = $lamaran->suratDitolak()->first();
        $lowongan = $lamaran->lowongan;
        $perusahaan = $lamaran->lowongan->perusahaan;
        $alasan = $surat->alasan;
        $pdf =Pdf::loadView("pdf.suratDitolak",compact(["lamaran","siswa","surat","perusahaan","lowongan","alasan"]));
        $namaPdf = "surat-pemberitahuan-ditolak-{$siswa->name}.pdf";
        return $pdf->download($namaPdf); 
    }
}