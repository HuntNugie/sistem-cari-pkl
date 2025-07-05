<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

abstract class Controller
{
    public function emailAjuan($pengajuan,$mail){
         $alasan = $pengajuan->alasan;
            $email = $pengajuan->perusahaan->email;
            $namaPerusahaan = $pengajuan->perusahaan->perusahaanProfile->nama_perusahaan;
            Mail::to($email)->send(new $mail($alasan,$namaPerusahaan));
    }
}

