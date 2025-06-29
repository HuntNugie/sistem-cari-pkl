<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PerusahaanController extends Controller
{
    public $api;

    public function __construct()
    {
        $this->api = Http::withoutVerifying()->get("https://api.quotable.io/random", [
            'minLength' => 50,
            'maxLength' => 80,
        ]);
    }

    public function dashboard()
    {
        $quote = $this->api->json();
        return view("perusahaan.dashboard", ["quote" => $quote]);
    }
    public function daftarLowongan()
    {
        $quote = $this->api->json();
        // Logic to fetch and display job listings
        return view("perusahaan.daftar-lowongan", ["quote" => $quote]);
    }
    public function daftarSiswaBaru()
    {
        $quote = $this->api->json();
        // Logic to fetch and display new students
        return view("perusahaan.daftar-siswa-baru", ["quote" => $quote]);
    }
}
