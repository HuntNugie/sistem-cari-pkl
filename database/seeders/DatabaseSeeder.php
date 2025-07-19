<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\SekolahSeeder;
use Database\Seeders\PerusahaanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([JurusanSeeder::class,AdminSeeder::class,PerusahaanSeeder::class,SekolahSeeder::class]);

    }
}
