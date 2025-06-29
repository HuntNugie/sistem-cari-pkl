<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PerusahaanController extends Controller
{
    public function dashboard()
    {
        $api = Http::withoutVerifying()->get("https://api.quotable.io/random",[
    'minLength' => 50,
    'maxLength' => 80,
]);
        $quote = $api->json();
        return view("perusahaan.dashboard", ["quote" => $quote]);
    }
}
