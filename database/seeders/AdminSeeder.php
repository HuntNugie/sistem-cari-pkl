<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $admin = Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
       $admin->profile()->create([
           'name' => 'Admin',
           'email' => 'admin@example.com',
           'phone' => '123456789',
           'nomor_pegawai' => 'EMP001',
       ]);
    }
}
