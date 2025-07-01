<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use App\Helpers\StringHelper;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         $jurusans = [
            'Rekayasa Perangkat Lunak',
            'Teknik Komputer dan Jaringan',
            'Multimedia',
            'Teknik Kendaraan Ringan Otomotif',
            'Teknik dan Bisnis Sepeda Motor',
            'Teknik Instalasi Tenaga Listrik',
            'Teknik Elektronika Industri',
            'Teknik Jaringan Akses Telekomunikasi',
            'Teknik Konstruksi dan Properti',
            'Desain Pemodelan dan Informasi Bangunan',
            'Teknik Pemesinan',
            'Teknik Pengelasan',
            'Teknik Pendingin dan Tata Udara',
            'Teknik Kimia Industri',
            'Teknik Geomatika dan Geospasial',
            'Agribisnis Tanaman',
            'Agribisnis Ternak',
            'Agribisnis Perikanan Air Tawar',
            'Agribisnis Pengolahan Hasil Pertanian',
            'Teknologi Laboratorium Medik',
            'Asisten Keperawatan',
            'Farmasi Klinis dan Komunitas',
            'Akuntansi dan Keuangan Lembaga',
            'Otomatisasi dan Tata Kelola Perkantoran',
            'Pemasaran',
            'Perbankan dan Keuangan Mikro',
            'Usaha Perjalanan Wisata',
            'Tata Boga',
            'Tata Busana',
            'Perhotelan',
            'Broadcasting dan Perfilman',
            'Animasi',
            'Kriya Kreatif Batik dan Tekstil',
            'Kriya Kreatif Kayu dan Rotan',
            'Teknik Logistik',
            'Teknik Otomasi Industri',
            'Teknik Pembangkit Tenaga Listrik',
            'Teknik Energi Terbarukan',
        ];
        foreach ($jurusans as $jurusan) {
           Jurusan::create([
                'nama_jurusan' => $jurusan,
                'slug' => Str::slug($jurusan),
                'singkatan' => StringHelper::singkatan($jurusan),
            ]);
        }
        // $jurus = Jurusan::all();
        // foreach($jurus as $jurusan){
        //     $jurusan->singkatan = StringHelper::singkatan($jurusan->nama_jurusan);
        //     $jurusan->save();
        // }
    }
}
