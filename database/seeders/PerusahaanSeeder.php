<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perusahaan = Perusahaan::create([
            "email" => "nugiekurniawan02@gmail.com",
            "password" => Hash::make("nugitea123"),
            "email_verified_at" => now(),
        ]);
        $perusahaan->perusahaanProfile()->create([
            "nama_perusahaan" => "PT. Nugie Kurniawan",
            "alamat" => "Jl. Raya No. 123, Jakarta",
            "telepon" => "021-12345678",
            "website" => "https://www.nugiekurniawan.com",
            "deskripsi" => "Perusahaan yang bergerak di bidang teknologi informasi.",
        ]);
    }
}
